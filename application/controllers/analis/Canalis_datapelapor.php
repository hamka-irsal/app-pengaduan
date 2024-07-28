<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Canalis_datapelapor extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mform_pengaduan');
		// $this->load->model('Madmin_datauser');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		// $data['user']=$this->Madmin_datauser->user();
		// $data['level']=$this->Madmin_datauser->level();
		// $data['role']=$this->Madmin_datauser->role();
		$data['kategori']= $this->Mform_pengaduan->kategori();
		$data['tempat']= $this->Mform_pengaduan->tempat();
		$data['jenis']= $this->Mform_pengaduan->jenis_kejadian();
		$data['kejadian']= $this->Mform_pengaduan->jml_kejadian();
		$this->load->view('analis_datapelapor',$data);
	}

	public function ruang()
	{
		$id = $this->input->post('id');
		$data= $this->Mform_pengaduan->ruang($id);
		echo json_encode($data);
	}

	public function tambah()
	{
		if ($this->input->post('simpan')) {
			$this->Mform_pengaduan->tambah();
			
			$this->session->set_flashdata('style', 'success');
			$this->session->set_flashdata('alert', 'Berhasil!');
			$this->session->set_flashdata('message', 'Pengaduan telah direkam.');
			
			redirect('analis/data_pelapor');
		}
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('analis/data_pelapor');
	  }
	  	else
	  {
		   $cek_old = $this->Mform_pengaduan->cek_old();

		   if (count($cek_old) == 0){
			    $this->session->set_flashdata('style','danger' );
			    $this->session->set_flashdata('alert','Gagal!' );
			    $this->session->set_flashdata('message','Password lama yang Anda masukkan salah' );
			    
			    redirect('analis/data_pelapor');
		   }
		   	else
		   {
			    $this->Mform_pengaduan->save();
			    $this->session->sess_destroy();
			    
			    redirect('login_pengaduan');
		   }//end if valid_user
		}
 	}
    
}