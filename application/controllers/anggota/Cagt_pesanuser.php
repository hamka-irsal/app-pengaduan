<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cagt_pesanuser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Madm_pengaduanmsk');
        $this->load->model('Magt_pesanuser');
        $this->load->model('Madm_feedback');
    }

    public function tampilkanFormPesan($id_pengaduan) {
        $pengaduan = $this->Madm_pengaduanmsk->getPengaduanById($id_pengaduan);

        $data['pengaduan'] = $pengaduan;

        $this->load->view('agtkirim_umpanbalik', $data);
    }
    
    public function tampilkanUmpanBalik($id_pengaduan) {
        $feedback = $this->Madm_feedback->getFeedbackByPengaduanId($id_pengaduan);

        $data['feedback'] = $feedback;

        $this->load->view('agttampilkan_umpanbalik', $data);
    }

    public function kirimPesan($id_pengaduan) {
        $pengaduan = $this->Madm_pengaduanmsk->getPengaduanById($id_pengaduan);

        if ($pengaduan) {
            $pesan = $this->input->post('pesan');

            if (!empty($pesan)) {
                $data_pesan = [
                    'id_pengaduan' => $pengaduan->id_pengaduan,
                    'pesan' => $pesan,
                    'pengirim' => 'user',
                    'created_at' => date('Y-m-d H:i:s')
                ];

                if ($this->Magt_pesanuser->simpanPesan($data_pesan)) {
		        redirect('anggota/data_umpanbalik');
                } else {
                    echo "Gagal mengirim pesan!";
                }
            } else {
                echo "Pesan tidak boleh kosong!";
            }
        } else {
            echo "Pengaduan tidak ditemukan!";
        }
    }
}
