<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Canalis_lapbulanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('analis_lapbulanan', array('error' => ' ' ));
    }

    public function do_upload()
    {
        $config['upload_path']          = './uploads_file_bulanan/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 2048; // 2MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('analis_lapbulanan', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('analis_lapbulanan_success', $data);
        }
    }
}