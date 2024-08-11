<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadm_feedback extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('url','form');
        $this->load->model('Madm_pengaduanmsk');
        $this->load->model('Madm_feedback');
        $this->load->model('Magt_pesanuser');
    }

    public function tampilkanFormUmpanBalik($id_pengaduan) {
        $pengaduan = $this->Madm_pengaduanmsk->getPengaduanById($id_pengaduan);

        $data['pengaduan'] = $pengaduan;

        $this->load->view('admkirim_umpanbalik', $data);
    }

    public function tampilkanUmpanBalik($id_pengaduan) {
        $feedback = $this->Madm_feedback->getFeedbackByPengaduanId($id_pengaduan);

        $data['feedback'] = $feedback;

        $this->load->view('agttampilkan_umpanbalik', $data);
    }

    public function kirimUmpanBalik($id_pengaduan) {
        $pengaduan = $this->Madm_pengaduanmsk->getPengaduanById($id_pengaduan);

        if ($pengaduan) {
            $pesan_umpan_balik = $this->input->post('pesan');

            $data_umpan_balik = [
                'id_pengaduan' => $pengaduan->id_pengaduan,
                'pesan' => $pesan_umpan_balik,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Madm_feedback->simpanUmpanBalik($data_umpan_balik);

            redirect('admin/data_umpanbalik');
        } else {
            echo "Pengaduan tidak ditemukan!";
        }
        
    }

    public function tampilkanFormPesan($id_pengaduan) {
        $pengaduan = $this->Madm_pengaduanmsk->getPengaduanById($id_pengaduan);

        $data['pengaduan'] = $pengaduan;

        $this->load->view('agtkirim_umpanbalik', $data);
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

                if ($this->Madm_feedback->simpanPesan($data_pesan)) {
                    redirect('agt_umpanbalik');
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

    public function tampilkanPesanAdmin($id_pengaduan) {
        $pengaduan = $this->Madm_pengaduanmsk->getPengaduanById($id_pengaduan);
        $pesan_list = $this->Magt_pesanuser->getPesanByPengaduanId($id_pengaduan);
    
        $data['pengaduan'] = $pengaduan;
        $data['pesan_list'] = $pesan_list;
    
        $this->load->view('admtampilkan_umpanbalik', $data);
    }
}
