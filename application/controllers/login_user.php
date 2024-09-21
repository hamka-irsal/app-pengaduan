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
        
        // $email = $this->input->post('email');
        // $password = $this->input->post('password');
        
        // $user = $this->Muser->get_user_by_email($email);
        
        // if ($user && password_verify($password, $user->password)) {
        //     // Set session atau logic lainnya untuk login
        //     $this->session->set_userdata('logged_in', $user);
        //     redirect('anggota/Cagt_dashboard');
        // } else {
        //     // Tampilkan pesan error
        //     $this->session->set_flashdata('error', 'Email atau password salah');
        //     redirect('login');
        // }

        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $result = $this->Muser->loginMe($email, $password);
            
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('id_user'=>$res->id_user,                    
                                            'id_role'=>$res->id_role,
                                            'role'=>$res->role,
                                            'nama_pengguna'=>$res->nama_pengguna,
                                            'id_level'=>$res->id_level,
                                            'email'=>$email,
                                            'id_level'=>$res->id_level,
                                            'isLoggedIn' => TRUE
                                    );
                    // var_dump($res->id_level); exit;
                    $this->session->set_userdata($sessionArray);
                    if ($res->id_level == 5) {
                        redirect('admin');
                    }
                    elseif ($res->id_level == 1) {
                        redirect('anggota');
                    }
                    elseif ($res->id_level == 2) {
                        redirect('analis');
                    }
                    elseif ($res->id_level == 3 || $res->id_level == 4) {
                        redirect('koordinator');
                    }
                    elseif ($res->id_level == 6) {
                        redirect('manajemen');
                    }
                    else{
                        $this->session->sess_destroy();
                        redirect('karyawan');
                    }
                }
            }
            else
            {
                $this->session->set_flashdata('style','danger');
                $this->session->set_flashdata('alert', 'Gagal login!');
                $this->session->set_flashdata('message', 'Periksa kembali email dan password Anda.');
                
                redirect('login');
            }
        }
    }
}
