<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Upt extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
	}
    public function index()
    {
        $this->load->view('upt');
    }
}
