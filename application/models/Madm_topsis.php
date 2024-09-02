<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_topsis extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_pengaduan() {
        $query = $this->db->get('pengaduan');
        return $query->result(); // Mengembalikan array objek
    }

    public function get_bobot() {
        return $this->db->get('bobot_kriteria')->row_array();
    }

    public function insert_pengaduan($data) {
        return $this->db->insert('pengaduan', $data);
    }

    public function getPengaduanData() {
        $this->db->select('id_pengaduan, biaya, sdm, regulasi');
        $query = $this->db->get('pengaduan');
        return $query->result_array();
    }
}
    
?>