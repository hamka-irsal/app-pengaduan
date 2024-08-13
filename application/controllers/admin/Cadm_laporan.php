<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Cadm_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madm_pengaduanmsk');
        $this->load->model('Madm_log');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
	{
		$data['log_activity']=$this->Madm_log->log_activity();
		$data['level']=$this->Madm_log->level();
		// $data['pengaduan']=$this->Madm_log->pengaduan();
		$this->load->view('adm_log',$data);
	}

    public function selesai()
    {
        $data['pengaduan_selesai'] = $this->Madm_pengaduanmsk->get_selesai_pengaduan();
        $this->load->view('adm_hasillaporan', $data);
    }
}
