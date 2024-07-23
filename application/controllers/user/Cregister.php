<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cregister extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin_datauser');
		$this->load->database();
		$this->load->helper(array('url','download'));
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['user']=$this->Madmin_datauser->user();
		$data['level']=$this->Madmin_datauser->level();
		$data['role']=$this->Madmin_datauser->role();
		$this->load->view('login',$data);
	}

	public function tambah_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_pengguna','Nama Pengguna','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == FALSE)
		{
			redirect('user/register_user');
		}else{
			$nama = $this->input->post('nama_pengguna');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role = $this->input->post('id_role');
			$level = $this->input->post('id_level');
			
			$cek_user = $this->db->where('email', $email)->or_where('username', $username)->get('user')->num_rows();

			if($cek_user > 0){
				$this->session->set_flashdata('style','danger');
				$this->session->set_flashdata('alert','Peringatan!');
				$this->session->set_flashdata('message','Data yang Anda tambahkan sudah terdaftar pada sistem.');
				redirect('user/register_user');
			}
			else
			{
				$data = array(
					'nama_pengguna' => strtolower($nama),
					'username' => $username,
					'email' => $email,
					'password' => password_hash($password, PASSWORD_BCRYPT),
					'id_role' => $role,
					'id_level' => $level
				);
				$this->Madmin_datauser->tambah_user($data);

				$this->session->set_flashdata('style','success');
				$this->session->set_flashdata('alert','Berhasil!');
				$this->session->set_flashdata('message','Data pengguna baru telah tersimpan.');

				redirect('user/register_user');
			}
		}
	}

}
