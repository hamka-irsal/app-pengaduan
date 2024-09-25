<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_pengaduan extends CI_Model {

    // Fungsi untuk mengambil data pengaduan berdasarkan ID (bisa juga untuk semua pengaduan)
    public function get_pengaduan($id_pengaduan = null) {
        if ($id_pengaduan !== null) {
            // Ambil pengaduan berdasarkan ID tertentu
            $this->db->where('id_pengaduan', $id_pengaduan);
            $query = $this->db->get('pengaduan');
            return $query->row_array(); // Mengambil satu baris data dalam bentuk array
        } else {
            // Ambil semua pengaduan jika ID tidak diberikan
            $query = $this->db->get('pengaduan');
            return $query->result_array(); // Mengambil semua baris data dalam bentuk array
        }
    }

    public function get_pengaduan_by_id($id_pengaduan) {
        // Ambil satu pengaduan berdasarkan ID
        $query = $this->db->get_where('pengaduan', ['id_pengaduan' => $id_pengaduan]);
        return $query->row_array(); // Mengembalikan satu baris sebagai array
    }
     
    // Fungsi untuk mengambil semua pengaduan
    public function get_all_pengaduan() {
        $query = $this->db->get('pengaduan');
        return $query->result_array(); // Mengembalikan semua data pengaduan
    }

    // Fungsi untuk menambahkan data pengaduan baru
    public function insert_pengaduan($data) {
        return $this->db->insert('pengaduan', $data); // Menyisipkan data ke tabel pengaduan
    }

    // Fungsi untuk memperbarui data pengaduan
    public function update_pengaduan($id_pengaduan, $data) {
        $this->db->where('id_pengaduan', $id_pengaduan);
        return $this->db->update('pengaduan', $data); // Memperbarui data di tabel pengaduan
    }

    // Fungsi untuk menghapus data pengaduan
    public function delete_pengaduan($id_pengaduan) {
        $this->db->where('id_pengaduan', $id_pengaduan);
        return $this->db->delete('pengaduan'); // Menghapus data dari tabel pengaduan
    }
}
