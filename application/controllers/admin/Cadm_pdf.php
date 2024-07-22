<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Cadm_pdf extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Madm_log'); // Pastikan anda sudah memiliki model untuk mengambil data
    }

    public function download_pdf() {
        $logs = $this->Madm_log->get_logs(); // Ganti dengan method yang sesuai untuk mengambil data log dari model

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Header
        $pdf->Cell(40, 10, 'ID Pengaduan');
        $pdf->Cell(40, 10, 'Status');
        $pdf->Cell(40, 10, 'Waktu');
        $pdf->Ln();

        // Data
        foreach ($logs as $log) {
            $pdf->Cell(40, 10, $log->id_pengaduan);
            $pdf->Cell(40, 10, $log->status);
            $pdf->Cell(40, 10, $log->timestamp);
            $pdf->Ln();
        }

        $pdf->Output('D', 'log_data.pdf');
    }
}
