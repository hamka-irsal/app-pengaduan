<?php
class Madm_feedback extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function simpanUmpanBalik($data_umpan_balik) {
        $this->db->insert('feedback', $data_umpan_balik);
    }

    public function getFeedbackByPengaduanId($id_pengaduan) {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $query = $this->db->get('feedback');
        return $query->row();
    }
}
