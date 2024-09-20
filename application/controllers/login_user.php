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

    public function login() {
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->Muser->get_user_by_email($email);
        
        if ($user && password_verify($password, $user->password)) {
            // Set session atau logic lainnya untuk login
            $this->session->set_userdata('logged_in', $user);
            redirect('anggota/Cagt_dashboard');
        } else {
            // Tampilkan pesan error
            $this->session->set_flashdata('error', 'Email atau password salah');
            redirect('login');
        }
    }
}
