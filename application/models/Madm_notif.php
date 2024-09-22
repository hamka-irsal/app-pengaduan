<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Model Notifikasi_model.php
class Madm_notif extends CI_Model
{
    public function tambahNotifikasi($id_user, $id_pengaduan, $pesan) {
        $data = [
            'id_user' => $id_user,
            'id_pengaduan' => $id_pengaduan,
            'pesan' => $pesan,
            'status' => 'unread'
        ];
        return $this->db->insert('notifikasi', $data);
    }
    
    public function getNotifikasiByUser($id_user) {
        $this->db->where('id_user', $id_user);
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('notifikasi')->result();
    }
    
    public function tandaiDibaca($id_notifikasi) {
        $this->db->where('id_notifikasi', $id_notifikasi);
        $this->db->update('notifikasi', ['status' => 'read']);
    }
}
