<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cagt_dashboard extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin_datauser');
        $this->load->model('Madm_pengaduanmsk');
        $this->load->model('Madm_notif');
        $this->load->model('Madm_log');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
        $data['user']=$this->Madmin_datauser->user();
		$data['level']=$this->Madmin_datauser->level();
		$data['role']=$this->Madmin_datauser->role();
        $data['log_activity']=$this->Madm_log->log_activity();
		$data['level']=$this->Madm_log->level();

        $this->load->view('agt_dashboard', $data);

    }

    

    public function lihat_notifikasi($id_notifikasi) {
        // Update status notifikasi menjadi 'TERBACA'
        $this->Madm_notif->update_status_notifikasi($id_notifikasi, 'dibaca');

        // Redirect ke halaman pengaduan terkait
        $notifikasi = $this->Madm_notif->get_notifikasi($id_notifikasi);
        redirect('admin/data_log/' . $notifikasi->id_pengaduan);
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