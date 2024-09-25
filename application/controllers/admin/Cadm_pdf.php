<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Cadm_pdf extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Madm_log'); // Pastikan anda sudah memiliki model untuk mengambil data
        $this->load->model('Madm_pengaduan'); // Pastikan anda sudah memiliki model untuk mengambil data
		$this->load->helper('url','form');
    }

    public function download_pdf($id_pengaduan = null) {
        // Ambil data pengaduan berdasarkan ID
        $pengaduan = $this->Madm_pengaduan->get_pengaduan_by_id($id_pengaduan);

        // Jika pengaduan tidak ditemukan, tampilkan error
        if (!$pengaduan) {
            show_error('Pengaduan dengan ID ' . $id_pengaduan . ' tidak ditemukan.');
            return;
        }
    
        // Mulai proses pembuatan PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
    
        // Header PDF
        $pdf->Cell(60, 10, '', 0, 0, 'C');
        $pdf->Cell(70, 10, 'POLITEKNIK NEGERI UJUNG PANDANG', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(60, 10, '', 0, 0, 'C');
        $pdf->Cell(70, 10, 'LAPORAN KERUSAKAN UPT. TEKNOLOGI PERMESINAN DAN PERALATAN PENUNJANG AKADEMIK', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(60, 10, '', 0, 0, 'C');
        $pdf->Cell(70, 10, 'NO LAPORAN: ' . (isset($pengaduan['id_pengaduan']) ? $pengaduan['id_pengaduan'] : 'Tidak Ditemukan'), 0, 1, 'C');
    
        // Informasi Pengaduan
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 10, 'NAMA ALAT/MESIN:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(60, 10, isset($pengaduan['alat']) ? $pengaduan['alat'] : 'Tidak Ditemukan', 0, 0);
        $pdf->Cell(40, 10, 'NO INVENT: ' . (isset($pengaduan['inventaris']) ? $pengaduan['inventaris'] : 'Tidak Ditemukan'), 0, 1);
    
        // Spesifikasi dan Tanggal
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 10, 'SPESIFIKASI:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(60, 10, isset($pengaduan['spesifikasi']) ? $pengaduan['spesifikasi'] : 'Tidak Ditemukan', 0, 0);
        $pdf->Cell(40, 10, 'TANGGAL: ' . (isset($pengaduan['tgl_kejadian']) ? $pengaduan['tgl_kejadian'] : 'Tidak Ditemukan'), 0, 1);
    
        // Kerusakan dan Jurusan
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 10, 'KERUSAKAN:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(60, 10, isset($pengaduan['penyebab']) ? $pengaduan['penyebab'] : 'Tidak Ditemukan', 0, 0);
        $pdf->Cell(40, 10, 'JURUSAN/UNIT: ' . (isset($pengaduan['jurusan']) ? $pengaduan['jurusan'] : 'Tidak Ditemukan'), 0, 1);
    
        // Program Studi
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 10, 'PROGRAM STUDI:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(60, 10, isset($pengaduan['studi']) ? $pengaduan['studi'] : 'Tidak Ditemukan', 0, 1);
    
        // Informasi Pelapor
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(60, 10, 'DILAPORKAN OLEH', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(40, 10, 'NAMA:', 0, 0);
        $pdf->Cell(60, 10, isset($pengaduan['nama']) ? $pengaduan['nama'] : 'Tidak Ditemukan', 0, 1);
        $pdf->Cell(40, 10, 'NIP/NIKH:', 0, 0);
        $pdf->Cell(60, 10, isset($pengaduan['nip']) ? $pengaduan['nip'] : 'Tidak Ditemukan', 0, 1);
    
        // Catatan Tambahan
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(60, 10, 'CATATAN TAMBAHAN', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 10, 'URAIAN: ' . (isset($pengaduan['uraian']) ? $pengaduan['uraian'] : 'Tidak Ditemukan'));
        $pdf->Cell(60, 10, 'PENYEDIA: ' . (isset($pengaduan['penyedia']) ? $pengaduan['penyedia'] : 'Tidak Ditemukan'), 0, 1);
        $pdf->Cell(60, 10, 'BAHAN: ' . (isset($pengaduan['bahan']) ? $pengaduan['bahan'] : 'Tidak Ditemukan'), 0, 1);
    
        // Dokumentasi Gambar
        if (!empty($pengaduan['gambar'])) {
            $pdf->Ln(5);
            $pdf->Cell(60, 10, 'DOKUMENTASI:', 0, 1);
            $pdf->Image(base_url('assets/gambar/' . $pengaduan['gambar']), 10, $pdf->GetY(), 50, 50);
        }
    
        // Output PDF
        $pdf->Output('D', 'pengaduan_data_' . $pengaduan['id_pengaduan'] . '.pdf');
    } 
    
}
