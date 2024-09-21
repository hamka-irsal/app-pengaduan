<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Model Notifikasi_model.php
class Madm_notif extends CI_Model
{
    public function buat_notifikasi($id_pengaduan, $id_user, $pesan) {
        $data = [
            'id_pengaduan' => $id_pengaduan,
            'id_user' => $id_user,
            'pesan' => $pesan,
            'status' => 'baru'
        ];
        $this->db->insert('notifikasi', $data);
    }

    public function update_status_notifikasi($id_notifikasi, $status) {
        $this->db->where('id', $id_notifikasi);
        $this->db->update('notifikasi', ['status' => $status]);
    }

    public function get_notifikasi_by_user($id_user) {
        $this->db->select('*');
        $this->db->from('notifikasi');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('created_at', 'DESC'); // Menampilkan notifikasi terbaru dulu
        return $this->db->get()->result();
    }
    
    public function get_notifikasi($id_notifikasi) {
        return $this->db->get_where('notifikasi', ['id' => $id_notifikasi])->row();
    }
}
