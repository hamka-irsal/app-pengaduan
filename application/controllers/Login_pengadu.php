<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pengadu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Muser');
		$this->load->model('Madm_pengaduanmsk');
		$this->load->helper('url','form');
	}

    public function tempat()
    {
        $this->db->select('id_tempat, nama_tempat');
        $this->db->from('tempat');
        $this->db->order_by('nama_tempat','ASC');
        return $this->db->get()->result();
    }

    public function ruang($id)
    {
        $this->db->select('id_ruang,nama_ruang');
        $this->db->from('ruang');
        $this->db->where('id_tempat',$id);
        $this->db->order_by('nama_ruang','ASC');
        return $this->db->get()->result();
    }
	    
    public function submit_pengaduan() {

        // Tangkap input dari form
        $waktu = $this->input->post('waktu');
        $ruang = $this->input->post('ruang');
        $tempat = $this->input->post('tempat');
        $kejadian = $this->input->post('kejadian');
        $tindaklanjut = $this->input->post('tindaklanjut');
        $email = $this->input->post('email');
        $nama_pengguna = $this->input->post('nama_pengguna');
        $nip = $this->input->post('nip');
        $jabatan = $this->input->post('jabatan');
        $alat = $this->input->post('alat');
        $spesifikasi = $this->input->post('spesifikasi');
        $inventaris = $this->input->post('inventaris');
        $jurusan = $this->input->post('jurusan');
        $studi = $this->input->post('studi');
        $inventaris = $this->input->post('inventaris');	
        $nama_pengguna = $this->input->post('nama_pengguna');
        $password = $this->input->post('password');
        $hidden = $this->input->post('hidden');
        
        $nama_pengguna = $this->input->post('nama_pengguna');
        $hidden = $this->input->post('hidden');
        
        $config['upload_path'] = './assets/gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['file_name'] = $nama_pengguna.'_'.'_'.time();
        
        $this->load->library('upload', $config); // Load konfigurasi uploadnya

        
        // Cek apakah email sudah terdaftar di tabel users
        $user = $this->Muser->get_user_by_email($email);
        
        if (!$user) {
            // Jika belum ada, buat akun baru otomatis di tabel users
            $data_user = [
                'email' => $email,
                'nama_pengguna' => $nama_pengguna,
                'password' => password_hash($password, PASSWORD_BCRYPT),  // Hash password
                'id_role' => 1, // Anda bisa set rolenya
                'is_auto_registered' => 1,
            ];
            $this->Muser->insert_user($data_user);
        }

        // Simpan data pengaduan ke tabel pengaduan
        $data_pengaduan = [
                'tgl_kejadian' => $waktu,
				'id_ruang' => $ruang,
				'kejadian' => $kejadian,
				'tindaklanjut' => $tindaklanjut,
				'email' => $email,
				'nama_pengguna' => $nama_pengguna,
				'nip' => $nip,
				'jabatan' => $jabatan,
				'alat' => $alat,
				'spesifikasi' => $spesifikasi,
				'inventaris' => $inventaris,
				'jurusan' => $jurusan,
				'studi' => $studi,
				'gambar' => $this->upload->data()['file_name']
                
        ];
        $this->Madm_pengaduanmsk->insert_pengaduan($data_pengaduan);
        
        // Redirect ke halaman sukses
        redirect('laporan_kerusakan');
    }

    // private function generate_password() {
    //     // Generate password random untuk akun yang didaftarkan otomatis
    //     return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
    // }
}
