<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_pengaduanmsk extends CI_Model {
    public function get_unread_pengaduan() {
        $this->db->where('status', 'unread'); // Assuming there's a status field
        $query = $this->db->get('pengaduan');
        return $query->result();
    }

    public function count_unread_pengaduan() {
        $this->db->where('status', 'unread');
        $this->db->from('pengaduan');
        return $this->db->count_all_results();
    }
}
?>
