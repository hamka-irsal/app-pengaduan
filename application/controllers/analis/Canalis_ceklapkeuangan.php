<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Canalis_ceklapkeuangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'file'));
    }

    public function index()
    {
        // Path ke folder uploads
        $path = './uploads_file/';
        
        // Ambil semua file di folder uploads
        $files = get_filenames($path);
        
        // Kirim data file ke view
        $data['files'] = $files;
        
        $this->load->view('analis_ceklapkeuangan', $data);
    }
}
