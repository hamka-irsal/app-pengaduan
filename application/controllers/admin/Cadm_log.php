<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_log extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_log');
		$this->load->helper('url','form');
		$this->load->library('pdf');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['log_activity']=$this->Madm_log->log_activity();
		$data['level']=$this->Madm_log->level();
		// $data['pengaduan']=$this->Madm_log->pengaduan();
		$this->load->view('adm_log',$data);
	}

	//function mau cek data user
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
		$cek_old = $this->Madm_log->cek_old();

		if (count($cek_old) == 0){
				$this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
				
				redirect('admin');
		}
			else
		{
				$this->Madm_log->save();
				$this->session->sess_destroy();
				$this->session->set_flashdata('error','Password anda telah berhasil diubah' );
				
				redirect('karyawan');
		}//end if valid_user
		}
	 }

	public function hapus_pengaduan($id_pengaduan)
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan',array('deleted' => '1'));

		$this->session->set_flashdata('style','warning');
		$this->session->set_flashdata('alert','Selesai!');
		$this->session->set_flashdata('message','Data pengaduan telah dihapus!');

		redirect('admin/data_log');
	}

	public function download_pdf($id_pengaduan) {
        $this->load->library('fpdf_lib');

        // Ambil data dari model
        $log = $this->Madm_log->get_log_by_id($id_pengaduan);

        // Inisialisasi FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Tambahkan data ke PDF
        $pdf->Cell(40, 10, 'ID Pengaduan: ' . $log->id_pengaduan);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Status: ' . $log->status);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Waktu: ' . $log->waktu);

        // Output PDF
        $pdf->Output('D', 'pengaduan_' . $log->id_pengaduan . '.pdf');
    }

	public function delete($id) {
        $this->Madm_log->delete_log($id);
        redirect('admin/data_log');
    }
}
