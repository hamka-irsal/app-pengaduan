<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_topsis extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Madm_topsis');
        $this->load->helper('url','form');
		// $this->isLoggedIn();
    }

    public function index() {
        // Ambil semua data pengaduan
        $pengaduan = $this->Madm_topsis->get_all_pengaduan();

        // Bobot untuk setiap kriteria (total harus 1)
        $bobot = [
            'biaya' => 0.4,
            'sdm' => 0.3,
            'regulasi' => 0.2
        ];

        // Langkah 1: Matriks keputusan ternormalisasi
        $normalized = $this->normalize($pengaduan, $bobot);

        // Langkah 2: Matriks keputusan ternormalisasi terbobot
        $weighted = $this->weighted_normalization($normalized, $bobot);

        // Langkah 3: Tentukan solusi ideal positif (A+) dan negatif (A-)
        $idealSolutions = $this->calculate_ideal_solutions($weighted);

        // Langkah 4: Hitung jarak ke solusi ideal positif dan negatif
        $distances = $this->calculate_distances($weighted, $idealSolutions);

        // Langkah 5: Hitung nilai preferensi dan ranking
        $ranking = $this->calculate_ranking($distances, $pengaduan);

        // Simpan ranking ke dalam database
        $this->Madm_topsis->save_ranking($ranking);

        // Tampilkan hasil ranking di view
        $data['ranking'] = $ranking;
        $this->load->view('adm_topsis', $data);
    }

    // Normalisasi matriks keputusan
    private function normalize($pengaduan, $bobot) {
        $normalized = [];
        $squares = ['biaya' => 0, 'sdm' => 0, 'regulasi' => 0];

        // Langkah 1.1: Hitung jumlah kuadrat untuk setiap kriteria
        foreach ($pengaduan as $data) {
            $squares['biaya'] += pow($data['biaya'], 2);
            $squares['sdm'] += pow($data['sdm'], 2);
            $squares['regulasi'] += pow($data['regulasi'], 2);
        }

        // Langkah 1.2: Normalisasi dengan membagi nilai dengan akar jumlah kuadrat
        foreach ($pengaduan as $data) {
            $normalized[] = [
                'id_pengaduan' => $data['id_pengaduan'],
                'email' => $data['email'],
                'biaya' => $data['biaya'] / sqrt($squares['biaya']),
                'sdm' => $data['sdm'] / sqrt($squares['sdm']),
                'regulasi' => $data['regulasi'] / sqrt($squares['regulasi'])
            ];
        }

        return $normalized;
    }

    // Normalisasi terbobot
    private function weighted_normalization($normalized, $bobot) {
        $weighted = [];
        foreach ($normalized as $data) {
            $weighted[] = [
                'id_pengaduan' => $data['id_pengaduan'],
                'email' => $data['email'],
                'biaya' => $data['biaya'] * $bobot['biaya'],
                'sdm' => $data['sdm'] * $bobot['sdm'],
                'regulasi' => $data['regulasi'] * $bobot['regulasi']
            ];
        }

        return $weighted;
    }

    // Menghitung solusi ideal positif dan negatif
    private function calculate_ideal_solutions($weighted) {
        $idealPositive = ['biaya' => 0, 'sdm' => 0, 'regulasi' => 0];
        $idealNegative = ['biaya' => INF, 'sdm' => INF, 'regulasi' => INF];

        // Cari nilai ideal positif (maksimum) dan negatif (minimum)
        foreach ($weighted as $data) {
            foreach (['biaya', 'sdm', 'regulasi'] as $kriteria) {
                $idealPositive[$kriteria] = max($idealPositive[$kriteria], $data[$kriteria]);
                $idealNegative[$kriteria] = min($idealNegative[$kriteria], $data[$kriteria]);
            }
        }

        return ['positive' => $idealPositive, 'negative' => $idealNegative];
    }

    // Menghitung jarak ke solusi ideal positif dan negatif
    private function calculate_distances($weighted, $idealSolutions) {
        $distances = [];
        foreach ($weighted as $data) {
            $dPositive = sqrt(pow($data['biaya'] - $idealSolutions['positive']['biaya'], 2) +
                              pow($data['sdm'] - $idealSolutions['positive']['sdm'], 2) +
                              pow($data['regulasi'] - $idealSolutions['positive']['regulasi'], 2));

            $dNegative = sqrt(pow($data['biaya'] - $idealSolutions['negative']['biaya'], 2) +
                              pow($data['sdm'] - $idealSolutions['negative']['sdm'], 2) +
                              pow($data['regulasi'] - $idealSolutions['negative']['regulasi'], 2));

            $distances[] = [
                'id_pengaduan' => $data['id_pengaduan'],
                'email' => $data['email'],
                'biaya' => $data['biaya'],
                'sdm' => $data['sdm'],
                'regulasi' => $data['regulasi'],
                'dPositive' => $dPositive,
                'dNegative' => $dNegative
            ];
        }

        return $distances;
    }

    // Menghitung nilai preferensi dan ranking
    private function calculate_ranking($distances, $pengaduan) {
        $ranking = [];
        
        foreach ($distances as $distance) {
            $dPositive = $distance['dPositive'];
            $dNegative = $distance['dNegative'];
            
            // Cek apakah pembagi (dPositive + dNegative) bernilai nol
            if (($dPositive + $dNegative) != 0) {
                // Jika pembagi tidak nol, lakukan pembagian
                $preference = $dNegative / ($dPositive + $dNegative);
            } else {
                // Jika pembagi nol, tetapkan nilai default, misalnya 0
                $preference = 0;
                log_message('error', 'Division by zero detected in calculate_ranking.');
            }
    
            // Masukkan hasil ke dalam array ranking
            $ranking[] = [
                'id_pengaduan' => $distance['id_pengaduan'],
                'email' => $distance['email'],
                'biaya' => $distance['biaya'],
                'sdm' => $distance['sdm'],
                'regulasi' => $distance['regulasi'],
                'preference' => $preference
            ];
        }
    
        return $ranking;
    

        // Urutkan berdasarkan nilai preferensi tertinggi
        usort($ranking, function($a, $b) {
            if ($b['preference'] == $a['preference']) {
                return 0;
            }
            return ($b['preference'] > $a['preference']) ? 1 : -1;
        });

        return $ranking;
    }

    public function edit_pengaduan($id_pengaduan) {
        // Ambil data pengaduan berdasarkan ID
        $data['pengaduan'] = $this->Madm_topsis->get_pengaduan_by_id($id_pengaduan);
        
        // Cek apakah data pengaduan ditemukan
        if (!$data['pengaduan']) {
            show_404(); // Tampilkan 404 jika pengaduan tidak ditemukan
        }

        // Tampilkan halaman edit
        $this->load->view('adm_edittopsis', $data);
    }

    public function update_pengaduan() {
        // Ambil data dari form
        $id_pengaduan = $this->input->post('id_pengaduan');
        $biaya = $this->input->post('biaya');
        $sdm = $this->input->post('sdm');
        $regulasi = $this->input->post('regulasi');
    
        // Validasi input
        if (empty($id_pengaduan) || empty($biaya) || empty($sdm) || empty($regulasi)) {
            // Jika ada input yang kosong, tampilkan error
            echo "Semua field harus diisi.";
            return;
        }
    
        // Panggil model untuk update data
        $this->load->model('Madm_topsis');
        $result = $this->Madm_topsis->update_pengaduan($id_pengaduan, $biaya, $sdm, $regulasi);
    
        // Cek apakah update berhasil
        if ($result) {
            // Redirect ke halaman SPK TOPSIS
            redirect('admin/data_topsis');
        } else {
            // Tampilkan pesan jika gagal update
            echo "Update gagal.";
        }
    }
}

?>