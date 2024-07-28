<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_dataumum extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('Madm_dataumum');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        $data['umum'] = $this->Madm_dataumum->get_all_umum();
        $this->load->view('adm_dataumum', $data);
    }

    public function create() {
        $this->load->view('adm_tambahumum');
    }

    public function store() {
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');
        $this->form_validation->set_rules('janji_layanan', 'Janji Layanan', 'required');
        $this->form_validation->set_rules('tupoksi_kerja', 'Tupoksi Kerja', 'required');
        $this->form_validation->set_rules('alur_pelaporan', 'Alur Pelaporan', 'required');
        $this->form_validation->set_rules('struktur_organisasi', 'Struktur Organisasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adm_tambahumum');
        } else {
            $data = [
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'),
                'janji_layanan' => $this->input->post('janji_layanan'),
                'tupoksi_kerja' => $this->input->post('tupoksi_kerja'),
                'alur_pelaporan' => $this->input->post('alur_pelaporan'),
                'struktur_organisasi' => $this->input->post('struktur_organisasi')
            ];
            $this->Madm_dataumum->insert_umum($data);
            redirect('admin/tambah_umum');
        }
    }

    public function edit($id) {
        $data['umum'] = $this->Madm_dataumum->get_umum_by_id($id);
        $this->load->view('adm_editumum', $data);
    }

    public function update($id) {
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');
        $this->form_validation->set_rules('janji_layanan', 'Janji Layanan', 'required');
        $this->form_validation->set_rules('tupoksi_kerja', 'Tupoksi Kerja', 'required');
        $this->form_validation->set_rules('alur_pelaporan', 'Alur Pelaporan', 'required');
        $this->form_validation->set_rules('struktur_organisasi', 'Struktur Organisasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['umum'] = $this->Madm_dataumum->get_umum_by_id($id);
            $this->load->view('adm_editumum', $data);
        } else {
            $data = [
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'),
                'janji_layanan' => $this->input->post('janji_layanan'),
                'tupoksi_kerja' => $this->input->post('tupoksi_kerja'),
                'alur_pelaporan' => $this->input->post('alur_pelaporan'),
                'struktur_organisasi' => $this->input->post('struktur_organisasi')
            ];
            $this->Madm_dataumum->update_umum($id, $data);
            redirect('admin/data_umum');
        }
    }

    public function delete($id) {
        $this->Madm_dataumum->delete_umum($id);
        redirect('admin/data_umum');
    }
}
?>