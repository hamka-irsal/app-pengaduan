<?php
class Madm_feedback extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function simpanUmpanBalik($data_umpan_balik)
    {
        $this->db->insert('feedback', $data_umpan_balik);
    }

    public function getFeedbackByPengaduanId($id_pengaduan)
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('id_pengaduan', $id_pengaduan);
        // return $this->db->get()->row(); // Ini hanya mengembalikan satu baris
        return $this->db->get()->result();
    }
}