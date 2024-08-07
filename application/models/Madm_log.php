<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_log extends CI_Model {

	public function log_activity()
	{
		$this->db->select('p.id_pengaduan, p.status, p.timestamp, r.nama_ruang, p.wkt_pengaduan, p.email');
		$this->db->from('pengaduan p');
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		// $this->db->where('p.deleted');
		$this->db->order_by('p.timestamp','DESC');
		return $this->db->get()->result();
	}

	// public function pengaduan()
	// {
	// 	$this->db->select('id_log, id_pengaduan, id_user, status, keterangan, timestamp');
	// 	$this->db->from('log');
	// 	$this->db->where('deleted',0);
	// 	$this->db->order_by('timestamp','ASC');
	// 	return $this->db->get()->result();
	// }

	public function detail_log($id_pengaduan)
	{
		$this->db->select('log.id_pengaduan, log.status, log.keterangan, user.id_user, level.id_level, level.nama_level, level.posisi, user.nama_pengguna, user.email, log.timestamp');
		$this->db->from('log','user','level');
		$this->db->join('user', 'user.id_user = log.id_user');
		$this->db->join('level', 'level.id_level = user.id_level');
		$this->db->where('id_pengaduan',$id_pengaduan);
		return $this->db->get()->result();
	}

	public function level()
	{
		return $this->db->get('level')->result();
	}

	public function pengaduan()
	{
		return $this->db->get('pengaduan')->result();
	}

	public function get_pengaduan($id) {
        $this->db->where('id_pengaduan', $id);
        $query = $this->db->get('pengaduan');
        return $query->row_array();
    }

	//bikin update password di admin dulu
	public function save()
	{
		$password = password_hash($this->input->post('new'), PASSWORD_BCRYPT);
		$data = array (
			'password' => $password
		);
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('user', $data);
	}

	//fungsi untuk mengecek password lama :
	public function cek_old()
	{
		$user = $this->db->select('password')->where('id_user', $this->session->userdata('id_user'))->get('user')->result();

		if(!empty($user)){
			if(password_verify($this->input->post('old'), $user[0]->password )){
				return $user;
			} else {
				return array();
			}
		} else {
			return array();
		}
	}
		//end

	public function get_log_by_id($id_pengaduan) {
		$this->db->where('id_pengaduan', $id_pengaduan);
		$query = $this->db->get('log');
		return $query->row();
	}

	public function get_logs() {
		$query = $this->db->select('id_pengaduan, status, timestamp')
							->from('log')
							->get();
		return $query->result();
	}

	public function delete_log($id) {
		$this->db->where('id_pengaduan', $id);
		return $this->db->delete('pengaduan');
	}

	public function get_pengaduan_data()
    {
        $this->db->select('id_pengaduan, alat, spesifikasi, kejadian, penyebab, inventaris, tgl_kejadian, jurusan, studi, nama, nip, gambar');
        $query = $this->db->get('pengaduan');
        return $query->result_array();
    }
}