<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madm_kegiatan extends CI_Model {

    public function get_all_kegiatan() {
        return $this->db->get('kegiatan')->result_array();
    }

    public function get_kegiatan($id) {
        return $this->db->get_where('kegiatan', array('id_kegiatan' => $id))->row_array();
    }

    public function insert_kegiatan($data) {
        return $this->db->insert('kegiatan', $data);
    }

    public function update_kegiatan($id, $data) {
        $this->db->where('id_kegiatan', $id);
        return $this->db->update('kegiatan', $data);
    }

    public function delete_kegiatan($id) {
        $this->db->where('id_kegiatan', $id);
        return $this->db->delete('kegiatan');
    }
}
