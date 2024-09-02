<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_datapenilaian extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Magt_penilaian');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
        $data['penilaian'] = $this->Magt_penilaian->get_all_penilaian(); // Gantilah dengan model Anda
        $this->load->view('adm_datapenilaian', $data);
	}

	public function cari() {
        $data['penilaian'] = [];

        if ($this->input->post('submit')) {
            $startDate = $this->input->post('start_date');
            $endDate = $this->input->post('end_date');

            // Validasi input tanggal
            if ($startDate && $endDate) {
                $data['penilaian'] = $this->Magt_penilaian->getPelaporanByDateRange($startDate, $endDate);
            } else {
                $data['error'] = 'Tanggal mulai dan akhir harus diisi!';
            }
        }

        $this->load->view('adm_caripenilaian', $data);
    }
}
?>