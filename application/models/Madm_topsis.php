<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_topsis extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getPengaduanData() {
        $this->db->select('id_pengaduan, biaya, sdm, regulasi');
        $query = $this->db->get('pengaduan');
        return $query->result_array();
    }
}
    
?>