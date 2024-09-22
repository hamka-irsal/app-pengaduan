<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Cagt_notifikasi extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_notif');
	}
    public function index() {
        $id_user = $this->session->userdata('id_user');
        $data['notifikasi'] = $this->Madm_notif->getNotifikasiByUser($id_user);
        $this->load->view('agt_notifikasi', $data);
    }

    public function tandaiDibaca($id_notifikasi) {
        $this->Madm_notif->tandaiDibaca($id_notifikasi);
        redirect('agt_notifikasi');
    }
}
