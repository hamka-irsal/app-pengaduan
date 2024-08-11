<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Cadm_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madm_pengaduanmsk');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function selesai()
    {
        $data['pengaduan_selesai'] = $this->Madm_pengaduanmsk->get_selesai_pengaduan();
        $this->load->view('adm_hasillaporan', $data);
    }
}
