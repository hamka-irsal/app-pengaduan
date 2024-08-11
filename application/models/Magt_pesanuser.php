<?php
class Magt_pesanuser extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function simpanPesan($data_pesan) {
        return $this->db->insert('messages', $data_pesan);
    }

    public function getPesanByPengaduanId($id_pengaduan) {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $query = $this->db->get('messages');
        return $query->result();
    }
}
