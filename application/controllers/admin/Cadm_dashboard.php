<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_dashboard extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_pengaduanmsk');
		$this->load->model('Madmin_datauser');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
        $data['user']=$this->Madmin_datauser->user();
		$data['level']=$this->Madmin_datauser->level();
		$data['role']=$this->Madmin_datauser->role();
        $data['pengaduan'] = $this->Madm_pengaduanmsk->get_unread_pengaduan();
        $data['unread_count'] = $this->Madm_pengaduanmsk->count_unread_pengaduan();
		$this->load->view('adm_dashboard', $data);
	}

    public function get_unread_count() {
        $count = $this->Madm_pengaduanmsk->count_unread_pengaduan();
        echo json_encode(['unread_count' => $count]);
    }

    public function get_unread_pengaduan() {
        $pengaduan = $this->Madm_pengaduanmsk->get_unread_pengaduan();
        echo json_encode($pengaduan);
    }

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
            $cek_old = $this->Madmin_datauser->cek_old();

            if (count($cek_old) == 0){
                $this->session->set_flashdata('style','danger');
                $this->session->set_flashdata('alert','Gagal!');
                $this->session->set_flashdata('message','Password lama yang Anda masukkan salah!');

                redirect('admin');
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