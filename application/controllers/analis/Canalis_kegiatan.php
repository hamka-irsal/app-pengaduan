<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Canalis_kegiatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Madm_kegiatan');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        $data['kegiatan'] = $this->Madm_kegiatan->get_all_kegiatan();
        $this->load->view('analis_kegiatan', $data);
    }

    public function create() {
        $this->load->view('adm_tambahkegiatan');
    }

    public function store() {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adm_tambahkegiatan');
        } else {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('adm_tambahkegiatan', $data);
            } else {
                $upload_data = $this->upload->data();
                $data = [
                    'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                    'foto' => $upload_data['file_name']
                ];
                $this->Madm_kegiatan->insert_kegiatan($data);
                redirect('admin/data_kegiatan');
            }
        }
    }

    public function edit($id) {
        $data['kegiatan'] = $this->Madm_kegiatan->get_kegiatan($id);
        $this->load->view('adm_editkegiatan', $data);
    }

    public function update($id) {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['kegiatan'] = $this->Madm_kegiatan->get_kegiatan($id);
            $this->load->view('adm_editkegiatan', $data);
        } else {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data['error'] = $this->upload->display_errors();
                $data['kegiatan'] = $this->Madm_kegiatan->get_kegiatan($id);
                $this->load->view('adm_editkegiatan', $data);
            } else {
                $upload_data = $this->upload->data();
                $data = [
                    'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                    'foto' => $upload_data['file_name']
                ];
                $this->Madm_kegiatan->update_kegiatan($id, $data);
                redirect('admin/data_kegiatan');
            }
        }
    }

    public function delete($id) {
        $this->Madm_kegiatan->delete_kegiatan($id);
        redirect('admin/data_kegiatan');
    }
}
