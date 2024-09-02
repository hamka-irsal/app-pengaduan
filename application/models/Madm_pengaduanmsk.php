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
	
    public function getPengaduanById($id_pengaduan) {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $query = $this->db->get('pengaduan');
        return $query->row();
    }

    public function get_selesai_pengaduan()
    {
        // Mengambil data pengaduan yang sudah selesai
        $this->db->where('status', 'selesai');
        $query = $this->db->get('pengaduan');
        return $query->result_array();
    }

    public function log_activity()
	{
		$this->db->select('p.id_pengaduan, p.status, p.timestamp, r.nama_ruang, p.wkt_pengaduan, p.wkt_pengerjaan, p.email');
		$this->db->from('pengaduan p');
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		// $this->db->where('p.deleted');
		$this->db->order_by('p.timestamp','DESC');
		return $this->db->get()->result();
	}

    public function getPelaporanByDateRange($startDate, $endDate) {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('wkt_pengaduan >=', $startDate);
        $this->db->where('timestamp <=', $endDate);
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_log($id) {
		$this->db->where('id_pengaduan', $id);
		return $this->db->delete('pengaduan');
	}
}
?>
