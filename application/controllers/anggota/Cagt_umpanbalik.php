<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cagt_umpanbalik extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Magt_umpanbalik');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['log_activity']=$this->Magt_umpanbalik->log_activity();
		$data['level']=$this->Magt_umpanbalik->level();
		$this->load->view('agt_umpanbalik',$data);
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('admin');
	  }
	  	else
	  {
	   $cek_old = $this->Madm_log->cek_old();

	   if (count($cek_old) == 0){
		    $this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
		    
		    redirect('admin');
	   }
	   	else
	   {
		    $this->Madm_log->save();
		    $this->session->sess_destroy();
		    $this->session->set_flashdata('error','Password anda telah berhasil diubah' );
		    
		    redirect('karyawan');
	   }//end if valid_user
	}
 }
}
