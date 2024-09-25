<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	function loginMe($user, $password)
{
    // Query untuk mendapatkan data user berdasarkan username
    $this->db->select('u.id_user, u.password, u.nama_pengguna, u.username, u.id_role, u.id_level, r.role');
    $this->db->from('user u');
    $this->db->join('roles r', 'r.id_role = u.id_role');
    $this->db->where('u.username', $user);
    $this->db->where('u.deleted', 0);
    $this->db->where('u.status', 1);
    $query = $this->db->get();

    $user = $query->row(); // Mengambil satu baris saja

    // Cek apakah pengguna ditemukan
    if (!empty($user)) {
        // Verifikasi password menggunakan md5
        if (md5($password) === $user->password) {
            return $user; // Jika password cocok, return data user
        } else {
            return array(); // Jika password tidak cocok, return array kosong
        }
    } else {
        return array(); // Jika username tidak ditemukan, return array kosong
    }
}


    //function yang dipakai buat reset password

    public function getByEmail($email){
      $this->db->where('email',$email);
      $result = $this->db->get('user');
      return $result;
  }

  public function simpanToken($data){
      $this->db->insert('token', $data);
      return $this->db->affected_rows();
  }

public function getToken($token){
        $this->db->select('token, id_user');
        $this->db->from('token');
        $this->db->where('token',$token);
        
        $query = $this->db->get();
        return $query->result();
  }

  public function cekToken($token){
      $this->db->where('token',$token);
      $result = $this->db->get('token');
      return $result;
  }

  public function ubahData($data,$id)
  {
    $this->db->where('id_user',$id);
    return $this->db->update('user', $data);
  }

  public function getLevel($id)
  {
    return $this->db
    ->join('level','level.id_level = user.id_level')
    ->where('user.id_user',$id)
    ->get('user')->row();
  }
}