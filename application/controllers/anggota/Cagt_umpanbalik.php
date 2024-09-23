<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cagt_umpanbalik extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Magt_umpanbalik');
		$this->load->model('Madm_log');
		$this->load->helper('url','form');
		$this->load->library('pdf');
		// $this->isLoggedIn();
	}

	public function index()
	{
		// $data['log_activity']=$this->Magt_umpanbalik->log_activity();
		$data['level']=$this->Magt_umpanbalik->level();
		$id_user = $this->session->userdata('id_user'); 
        $data['pengaduan'] = $this->Magt_umpanbalik->get_pengaduan_by_user_id($id_user);

		$this->load->view('agt_umpanbalik',$data);
	}

	public function detail($id) {
        $this->load->model('Madm_log');
        $data['pengaduan'] = $this->Madm_log->get_pengaduan($id);
        
        // Load the view and pass the data
        $this->load->view('agtdetail_umpanbalik', $data);
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
        $pdf->Cell(40, 10, 'Tempat: ' . $log->nama_ruang);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Status: ' . $log->status);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Waktu: ' . $log->waktu);

        // Output PDF
        $pdf->Output('D', 'pengaduan_' . $log->id_pengaduan . '.pdf');
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
}
