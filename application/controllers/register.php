<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Register extends BaseController {

	public function __construct() {
        parent::__construct();
        $this->load->model('Mregis_user');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('login');
    }

    public function register() {
        $data['roles'] = $this->Mregis_user->get_roles();
        $data['levels'] = $this->Mregis_user->get_levels();

        $this->form_validation->set_rules('nama_pengguna', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register', $data);
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $user_data = array(
                'nama_pengguna' => $this->input->post('nama_pengguna'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $password,
                'id_role' => $this->input->post('role'),
                'id_level' => $this->input->post('level')
            );

            if ($this->Mregis_user->insert_user($user_data)) {
                $this->session->set_flashdata('success', 'Registration successful.');
                redirect('karyawan');
            } else {
                $this->session->set_flashdata('error', 'Registration failed.');
                $this->load->view('register', $data);
            }
        }
    }
}
