<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {
    
    public function get_user_by_email($email) 
    {
        return $this->db->get_where('user', ['email' => $email])->row();
    }

    public function insert_user($data) 
    {
        $this->db->insert('user', $data);
    }

     public function get_roles() 
    {
        $query = $this->db->get('roles');
        return $query->result();
    }

    public function get_levels() 
    {
        $query = $this->db->get('level');
        return $query->result();
    }

    function loginMe($email, $password)
    {
        // Pilih kolom yang diperlukan dari tabel user dan roles
        $this->db->select('u.id_user, u.password, u.nama_pengguna, u.email, u.id_role, u.id_level, r.role');
        $this->db->from('user u');
        $this->db->join('roles r', 'r.id_role = u.id_role');
        $this->db->where('u.email', $email);
        $this->db->where('u.deleted', 0); // Pastikan akun tidak terhapus
        $this->db->where('u.status', 1);  // Pastikan akun aktif
        $query = $this->db->get();
    
        // Ambil satu baris data user
        $user = $query->row();
    
        // Verifikasi password menggunakan password_verify
        if ($user && password_verify($password, $user->password)) {
            return $user; // Return user jika email dan password cocok
        } else {
            return null; // Jika tidak cocok, return null
        }
    }
    
    
    public function get_user_by_id($id_user) {
        return $this->db->get_where('user', ['id_user' => $id_user])->row();
    }
    
}
