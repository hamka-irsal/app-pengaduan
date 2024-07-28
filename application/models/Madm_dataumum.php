<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_dataumum extends CI_Model {
    
    public function get_all_umum() {
        return $this->db->get('umum')->result_array();
    }

    public function get_umum_by_id($id) {
        return $this->db->get_where('umum', ['id_umum' => $id])->row_array();
    }

    public function insert_umum($data) {
        return $this->db->insert('umum', $data);
    }

    public function update_umum($id, $data) {
        $this->db->where('id_umum', $id);
        return $this->db->update('umum', $data);
    }

    public function delete_umum($id) {
        $this->db->where('id_umum', $id);
        return $this->db->delete('umum');
    }

}
