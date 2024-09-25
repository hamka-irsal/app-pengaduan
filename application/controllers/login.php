<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$this->isLoggedIn();
	}

	public function login_karyawan()
	{
		$this->load->view('login_karyawan');
	}

	function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        $role = $this->session->userdata('id_role');
        $level = $this->session->userdata('id_level');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login_karyawan');
        }
        else
        {
        	if ($level == 5 ) {
                	redirect('admin');
                }
                elseif ($level == 1) {
                	redirect('anggota');
                }
                elseif ($level == 2) {
                	redirect('analis');
                }
                elseif ($level == 3 || $level == 4) {
                	redirect('koordinator');
                }
                elseif ($level == 6) {
                    redirect('manajemen');
                }else{
                    $this->session->sess_destroy();
                    redirect('karyawan');
            }
        }
    }
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        $this->load->library('form_validation');
        
        // Validasi input form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index(); // Kembali ke halaman login jika validasi gagal
        } else {
            // Ambil input username dan password
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            // Panggil model untuk melakukan pengecekan username dan password
            $result = $this->Mlogin->loginMe($username, $password);
            
            // Cek apakah hasil login mengembalikan data user
            if (!empty($result)) {
                // Buat session jika login berhasil
                $sessionArray = array(
                    'id_user'       => $result->id_user,
                    'id_role'       => $result->id_role,
                    'role'          => $result->role,
                    'nama_pengguna' => $result->nama_pengguna,
                    'id_level'      => $result->id_level,
                    'username'      => $username,
                    'isLoggedIn'    => TRUE
                );
    
                // Set session untuk user yang login
                $this->session->set_userdata($sessionArray);
    
                // Redirect berdasarkan level user
                if ($result->id_level == 5) {
                    redirect('admin');
                } elseif ($result->id_level == 1) {
                    redirect('anggota');
                } elseif ($result->id_level == 2) {
                    redirect('analis');
                } elseif ($result->id_level == 3 || $result->id_level == 4) {
                    redirect('koordinator');
                } elseif ($result->id_level == 6) {
                    redirect('manajemen');
                } else {
                    // Hapus session jika tidak ada level yang cocok
                    $this->session->sess_destroy();
                    redirect('karyawan');
                }
            } else {
                // Jika username atau password salah, tampilkan pesan error
                $this->session->set_flashdata('style', 'danger');
                $this->session->set_flashdata('alert', 'Gagal login!');
                $this->session->set_flashdata('message', 'Periksa kembali username dan password Anda.');
                redirect('karyawan'); // Redirect kembali ke halaman login
            }
        }
    }
    

    public function logout_karyawan()
    {
    	$this->session->sess_destroy();
    	redirect('karyawan');
    }
}
