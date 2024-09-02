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
        // Mendapatkan data pengaduan
        $data['pengaduan'] = $this->Madm_topsis->get_pengaduan();

        if (empty($data['pengaduan'])) {
            show_error('Tidak ada data pengaduan untuk diproses.');
            return;
        }

        // Lakukan perhitungan TOPSIS dengan bobot acak untuk setiap pengadu
        $data['result'] = $this->hitung_topsis($data['pengaduan']);

        // Kirim data ke view
        $this->load->view('adm_topsis', $data);
    }

    private function generate_random_bobot() {
        // Generate 3 bobot acak dengan total 1
        $bobot = [
            'biaya' => mt_rand(1, 10) / 10,   // Random bobot antara 0.1 dan 1
            'sdm' => mt_rand(1, 10) / 10,     // Random bobot antara 0.1 dan 1
            'regulasi' => mt_rand(1, 10) / 10 // Random bobot antara 0.1 dan 1
        ];

        // Normalisasi bobot sehingga totalnya menjadi 1
        $total = array_sum($bobot);
        foreach ($bobot as &$value) {
            $value = $value / $total;
        }

        return $bobot;
    }

    private function generate_random_preferensi($count) {
        $preferensi = [];
        for ($i = 0; $i < $count; $i++) {
            $preferensi[] = mt_rand(0, 100) / 100; // Random preferensi antara 0.0 dan 1.0
        }
        return $preferensi;
    }

    private function hitung_topsis($pengaduan) {
        $result = [];
        
        // 1. Normalisasi Matriks Keputusan
        $normalisasi = [];
        $kriteria = ['biaya', 'sdm', 'regulasi'];

        foreach ($kriteria as $k) {
            $sum_of_squares = 0;
            foreach ($pengaduan as $p) {
                $sum_of_squares += pow($p->$k, 2);
            }
            $sqrt_sum_of_squares = sqrt($sum_of_squares);

            foreach ($pengaduan as $key => $p) {
                $normalisasi[$key][$k] = $sqrt_sum_of_squares != 0 ? $p->$k / $sqrt_sum_of_squares : 0;
            }
        }

        // Proses setiap pengaduan secara individual
        $preferensi = $this->generate_random_preferensi(count($pengaduan));
        
        foreach ($pengaduan as $key => $p) {
            $bobot = $this->generate_random_bobot();

            // 2. Membobot Matriks Normalisasi
            $membobot = [];
            foreach ($kriteria as $k) {
                $membobot[$k] = $normalisasi[$key][$k] * $bobot[$k];
            }

            // 3. Menentukan Solusi Ideal Positif dan Negatif
            $ideal_positive = [];
            $ideal_negative = [];
            foreach ($kriteria as $k) {
                $values = array_column($normalisasi, $k);
                if (empty($values)) {
                    $ideal_positive[$k] = 0;
                    $ideal_negative[$k] = 0;
                } else {
                    $ideal_positive[$k] = max($values);
                    $ideal_negative[$k] = min($values);
                }
            }

            // 4. Menghitung Jarak ke Solusi Ideal Positif dan Negatif
            $sum_positive = $sum_negative = 0;
            foreach ($kriteria as $k) {
                $sum_positive += pow($membobot[$k] - $ideal_positive[$k], 2);
                $sum_negative += pow($membobot[$k] - $ideal_negative[$k], 2);
            }
            $jarak_positif = sqrt($sum_positive);
            $jarak_negatif = sqrt($sum_negative);

            // 5. Menghitung Nilai Preferensi
            $score = ($jarak_positif + $jarak_negatif) != 0 ? $jarak_negatif / ($jarak_positif + $jarak_negatif) : 0;

            // Menggunakan nilai preferensi acak
            $result[] = [
                'pengaduan' => $p,
                'bobot' => $bobot,
                'score' => $score,
                'preferensi' => $preferensi[$key]
            ];
        }

        return $result;
    }
}

?>