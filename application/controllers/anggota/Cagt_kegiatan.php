<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Cagt_kegiatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Madm_kegiatan');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        $data['kegiatan'] = $this->Madm_kegiatan->get_all_kegiatan();
        $this->load->view('agt_kegiatan', $data);
    }
}
