<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_penilaian extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Magt_penilaian');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
        $data['penilaian'] = $this->Magt_penilaian->get_penilaian_count_with_date();
        $this->load->view('adm_penilaian', $data);
	}

    public function save_password()
    { 

        $this->load->library('form_validation');

        $this->form_validation->set_rules('new','New','required|alpha_numeric');
        $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

        if($this->form_validation->run() == FALSE)
        {
            redirect('admin');
        }
        else
        {
            $cek_old = $this->Magt_penilaian->cek_old();

            if (count($cek_old) == 0){
                $this->session->set_flashdata('style','danger');
                $this->session->set_flashdata('alert','Gagal!');
                $this->session->set_flashdata('message','Password lama yang Anda masukkan salah!');

                redirect('admin');
            }
            else
            {
                $this->Magt_penilaian->save();
                $this->session->sess_destroy();

                redirect('karyawan');
        }//end if valid_user
        }
	}

    public function chart() {
        $data['sangat_memuaskan'] = array(
            $this->Magt_penilaian->count_pendapat('pendapat1', 'Sangat Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat2', 'Sangat Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat3', 'Sangat Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat4', 'Sangat Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat5', 'Sangat Memuaskan')
        );
        $data['memuaskan'] = array(
            $this->Magt_penilaian->count_pendapat('pendapat1', 'Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat2', 'Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat3', 'Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat4', 'Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat5', 'Memuaskan')
        );
        $data['kurang_memuaskan'] = array(
            $this->Magt_penilaian->count_pendapat('pendapat1', 'Kurang Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat2', 'Kurang Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat3', 'Kurang Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat4', 'Kurang Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat5', 'Kurang Memuaskan')
        );
        $data['tidak_memuaskan'] = array(
            $this->Magt_penilaian->count_pendapat('pendapat1', 'Tidak Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat2', 'Tidak Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat3', 'Tidak Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat4', 'Tidak Memuaskan'),
            $this->Magt_penilaian->count_pendapat('pendapat5', 'Tidak Memuaskan')
        );
    
        $this->load->view('admin/data_chart', $data);

          // Hitung total responden
     $total_responden = array_sum($data['sangat_memuaskan']) +
     array_sum($data['memuaskan']) +
     array_sum($data['kurang_memuaskan']) +
     array_sum($data['tidak_memuaskan']);

        // Cek apakah ada setidaknya satu responden di setiap kategori
        if ($total_responden > 0) {
        $this->load->view('admin/data_chart', $data);
        } else {
        echo "Tidak ada data penilaian yang tersedia untuk ditampilkan dalam grafik.";
        }
    }
    
}
?>