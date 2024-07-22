<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Canalis_log extends BaseController {

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
		$this->load->view('analis_log',$data);
	}

	//function mau cek data user
	public function save_password()
	 { 

			$this->load->library('form_validation');

		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

			if($this->form_validation->run() == FALSE)
		{
				redirect('analis');
		}
			else
			{
		$cek_old = $this->Madm_log->cek_old();

		if (count($cek_old) == 0){
				$this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
				
				redirect('analis');
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

		redirect('analis/data_log');
	}

	public function downloadPdf()
    {
        $logModel = new Madm_log();
        $data = $logModel->findAll();

        // Inisialisasi FPDF
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Header
        $pdf->Cell(40, 10, 'ID Pengaduan');
        $pdf->Cell(40, 10, 'Ruang');
        $pdf->Cell(40, 10, 'Status');
        $pdf->Cell(40, 10, 'Waktu');
        $pdf->Ln();

        // Isi Data
        foreach ($data as $row) {
            $pdf->Cell(40, 10, $row['id_pengaduan']);
            $pdf->Cell(40, 10, $row['ruang']);
            $pdf->Cell(40, 10, $row['status']);
            $pdf->Cell(40, 10, $row['waktu']);
            $pdf->Ln();
        }

        // Output PDF
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('D', 'log_report.pdf');
    }
}
