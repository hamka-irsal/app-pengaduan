<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_user extends CI_Controller{
    function __construct()
	{
		parent::__construct();
		$this->load->model('Muser');
		// $this->load->model('Madmin_datauser');
		$this->load->helper('url','form');
		// $this->isLoggedIn();
	}
    public function login_form() {
        // Load form login
        $this->load->view('login');
    }

    public function login()
{
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

    if ($this->form_validation->run() == FALSE) {
        $this->index(); // Redirect kembali ke halaman login jika validasi gagal
    } else {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Panggil model untuk login
        $result = $this->Muser->loginMe($email, $password);

        if ($result) {
            // Login berhasil, buat session
            $sessionArray = array(
                'id_user'       => $result->id_user,
                'id_role'       => $result->id_role,
                'role'          => $result->role,
                'nama_pengguna' => $result->nama_pengguna,
                'id_level'      => $result->id_level,
                'email'         => $email,
                'isLoggedIn'    => TRUE
            );

            // Set session
            $this->session->set_userdata($sessionArray);

            // Redirect sesuai level user
            switch ($result->id_level) {
                case 5:
                    redirect('admin');
                    break;
                case 1:
                    redirect('anggota');
                    break;
                case 2:
                    redirect('analis');
                    break;
                case 3:
                case 4:
                    redirect('koordinator');
                    break;
                case 6:
                    redirect('manajemen');
                    break;
                default:
                    $this->session->sess_destroy();
                    redirect('karyawan');
                    break;
            }
        } else {
            // Login gagal
            $this->session->set_flashdata('style', 'danger');
            $this->session->set_flashdata('alert', 'Gagal login!');
            $this->session->set_flashdata('message', 'Periksa kembali email dan password Anda.');
            redirect('login');
        }
    }
}

    
}
