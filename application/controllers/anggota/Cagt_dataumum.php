<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cagt_dataumum extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin_datauser');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
        $data['user']=$this->Madmin_datauser->user();
		$data['level']=$this->Madmin_datauser->level();
		$data['role']=$this->Madmin_datauser->role();
		$this->load->view('agt_dataumum', $data);
	}

    public function save_password()
    { 

        $this->load->library('form_validation');

        $this->form_validation->set_rules('new','New','required|alpha_numeric');
        $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

        if($this->form_validation->run() == FALSE)
        {
            redirect('anggota');
        }
        else
        {
            $cek_old = $this->Madmin_datauser->cek_old();

            if (count($cek_old) == 0){
                $this->session->set_flashdata('style','danger');
                $this->session->set_flashdata('alert','Gagal!');
                $this->session->set_flashdata('message','Password lama yang Anda masukkan salah!');

                redirect('anggota');
            }
            else
            {
                $this->Madmin_datauser->save();
                $this->session->sess_destroy();

                redirect('karyawan');
        }//end if valid_user
        }
	}

    
}
?>