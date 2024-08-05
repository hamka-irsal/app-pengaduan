<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Cagt_penilaian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Magt_penilaian');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->model('Magt_penilaian');
        $data['penilaian'] = $this->Magt_penilaian->get_penilaian_count_with_date();
        $this->load->view('agt_penilaian', $data);
    }

    public function create() {
        $this->load->view('agt_penilaian');
    }

    public function store() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tgl_penilaian', 'Tanggal Penilaian', 'required');
        $this->form_validation->set_rules('nama', 'Nama Penilai', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        // Add validation rules for other fields if needed

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('agt_penilaian');
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'tgl_penilaian' => $this->input->post('tgl_penilaian'),
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'jabatan' => $this->input->post('jabatan'),
                'pendapat1' => $this->input->post('pendapat1'),
                'pendapat2' => $this->input->post('pendapat2'),
                'pendapat3' => $this->input->post('pendapat3'),
                'pendapat4' => $this->input->post('pendapat4'),
                'pendapat5' => $this->input->post('pendapat5'),
                'saran' => $this->input->post('saran')
            );
            $this->Magt_penilaian->insert_penilaian($data);
            redirect('anggota/tambah_penilaian');
        }
    }

    public function edit($id) {
        $data['penilaian'] = $this->Magt_penilaian->get_penilaian_by_id($id);
        $this->load->view('penilaian/edit', $data);
    }

    public function update($id) {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tgl_penilaian', 'Tanggal Penilaian', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        // Add validation rules for other fields if needed

        if ($this->form_validation->run() == FALSE) {
            $data['penilaian'] = $this->Magt_penilaian->get_penilaian_by_id($id);
            $this->load->view('penilaian/edit', $data);
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'tgl_penilaian' => $this->input->post('tgl_penilaian'),
                'nip' => $this->input->post('nip'),
                'jabatan' => $this->input->post('jabatan'),
                'pendapat1' => $this->input->post('pendapat1'),
                'pendapat2' => $this->input->post('pendapat2'),
                'pendapat3' => $this->input->post('pendapat3'),
                'pendapat4' => $this->input->post('pendapat4'),
                'pendapat5' => $this->input->post('pendapat5'),
                'saran' => $this->input->post('saran')
            );
            $this->Magt_penilaian->update_penilaian($id, $data);
            redirect('penilaian');
        }
    }

    public function delete($id) {
        $this->Magt_penilaian->delete_penilaian($id);
        redirect('penilaian');
    }
}
?>
