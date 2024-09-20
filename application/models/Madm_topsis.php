<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_topsis extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

     // Ambil semua data pengaduan beserta kriteria-kriterianya
     public function get_all_pengaduan() {
        $this->db->select('id_pengaduan, email, biaya, sdm, regulasi');
        $this->db->from('pengaduan');
        return $this->db->get()->result_array();
    }

    // Menyimpan ranking hasil akhir
    public function save_ranking($data) {
        $this->db->insert_batch('ranking', $data); // Menyimpan hasil ranking ke tabel `ranking`
    }

    public function update_pengaduan($id_pengaduan, $biaya, $sdm, $regulasi) {
        // Data yang akan diupdate
        $data = array(
            'biaya' => $biaya,
            'sdm' => $sdm,
            'regulasi' => $regulasi
        );

        // Update berdasarkan id_pengaduan
        $this->db->where('id_pengaduan', $id_pengaduan);
        return $this->db->update('pengaduan', $data); // Eksekusi query update
    }

    public function get_pengaduan_by_id($id_pengaduan) {
        // Pastikan $id_pengaduan benar dan tidak null
        if (!$id_pengaduan) {
            return false;
        }

        // Ambil data dari tabel 'pengaduan' berdasarkan 'id_pengaduan'
        $this->db->where('id_pengaduan', $id_pengaduan);
        $query = $this->db->get('pengaduan');

        // Periksa apakah data ditemukan
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan data sebagai array
        } else {
            return false; // Tidak ditemukan
        }
    }
}
    
?>