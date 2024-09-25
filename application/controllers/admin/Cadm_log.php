<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
use Config\Services;
class Cadm_log extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_log');
        $this->load->model('Madm_pengaduanmsk');
        $this->load->model('Madm_datamasuk');
		$this->load->model('Madm_notif');
        $this->load->model('Muser');
		$this->load->helper('url','form');
        $this->load->library('form_validation');
		$this->load->library('pdf');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['log_activity']=$this->Madm_log->log_activity();
		$data['level']=$this->Madm_log->level();
		$this->load->view('adm_log',$data);
	}
	
	public function cari() {
        $data['pengaduan'] = [];

        if ($this->input->post('submit')) {
            $startDate = $this->input->post('start_date');
            $endDate = $this->input->post('end_date');
			// var_dump($startDate);
			// var_dump($endDate);
			// die(true);
            // Validasi input tanggal
            if ($startDate && $endDate) {
                $data['pengaduan'] = $this->Madm_log->getPelaporanByDateRange($startDate, $endDate);
            } else {
                $data['error'] = 'Tanggal mulai dan akhir harus diisi!';
            }
        }

        $this->load->view('adm_carilog', $data);
    }

	public function edit($id) {
        $this->load->model('Madm_log');
        $data['pelaporan'] = $this->Madm_log->get_pelaporan_by_id($id);

        $this->load->view('adm_editlog', $data);
    }

    public function update($id) {
        $this->load->model('Madm_log');
        
        $this->form_validation->set_rules('wkt_pengerjaan', 'Tanggal Pengerjaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = array(
                'uraian' => $this->input->post('uraian'),
                'penyedia' => $this->input->post('penyedia'),
                'bahan' => $this->input->post('bahan'),
                'wkt_pengerjaan' => $this->input->post('wkt_pengerjaan')
            );
            
            $this->Madm_log->update_pelaporan($id, $data);
            redirect('admin/data_log');
        }
    }

	public function detail($id) {
        $this->load->model('Madm_log');
        $data['pengaduan'] = $this->Madm_log->get_pengaduan($id);
        // var_dump($data);
        // Load the view and pass the data
        $this->load->view('admdetail_pelaporan', $data);
    }

	public function generate_pdf()
    {
        $data['pengaduan_data'] = $this->Madm_log->get_pengaduan_data();
        
        // Load the view and store the output in a variable
        $html_content = $this->load->view('admpdf_pelaporan', $data, true);

        // Create a new PDF document
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        // Convert HTML to PDF
        $pdf->WriteHTML($html_content);

        // Output the PDF
        $pdf->Output('D', 'pengaduan.pdf');
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

    public function detail_koor($id)
	{
		$data['detail_pengaduan']=$this->Madm_datamasuk->detail_koor($id);
		$this->load->view('admdetail_datamasuk',$data);

	}

	public function konfirmasi()
	{
		$keterangan = $this->input->post('keterangan');
		$id_pengaduan = $this->input->post('id_pengaduan');

		// Mengambil id_user yang sesuai dengan id_pengaduan dari tabel pengaduan
		$this->db->select('id_user');
		$this->db->from('pengaduan');
		$this->db->where('id_pengaduan', $id_pengaduan);
		$user = $this->db->get()->row();

		if ($user) {
			$id_user = $user->id_user; // Ambil id_user yang terkait dengan pengaduan

			// Data yang akan disimpan ke tabel log
			$data = array(
				'id_pengaduan' => $id_pengaduan,
				'keterangan' => $keterangan,
				'id_user' => $id_user, // Menggunakan id_user yang diambil dari pengaduan
				'status' => 'selesai'
			);
			$this->Madm_log->konfirmasi($data);

			// Update status di tabel pengaduan
			$data2 = array(
				'status' => 'selesai'
			);
			$this->db->where('id_pengaduan', $id_pengaduan)->update('pengaduan', $data2);

			// Flash message
			$this->session->set_flashdata('style', 'success');
			$this->session->set_flashdata('alert', 'Berhasil!');
			$this->session->set_flashdata('message', 'Pengaduan telah dikonfirmasi.');
		} else {
			// Jika pengaduan tidak ditemukan
			$this->session->set_flashdata('style', 'danger');
			$this->session->set_flashdata('alert', 'Gagal!');
			$this->session->set_flashdata('message', 'Pengaduan tidak ditemukan.');
		}

		redirect('admin/data_log');
	}


    public function kirim()
	{
		$keterangan = $this->input->post('keterangan');
		$id_pengaduan = $this->input->post('id_pengaduan');
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'id_pengaduan'=>$id_pengaduan,
			'keterangan'=>$keterangan,
			'id_user'=>$id_user,
			'status'=>'diproses'
		);
		$this->Madm_log->kirim($data);

		$data2 = array(
			'status'=>'diproses'
		);
		$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',$data2);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Pengaduan telah terkirim.');

		redirect('admin/data_log');
	}

	public function tampilkanDetail($id_pengaduan)
	{
		// Mengambil id_user dari tabel pengaduan berdasarkan id_pengaduan
		$this->db->select('id_user');
		$this->db->from('pengaduan');
		$this->db->where('id_pengaduan', $id_pengaduan);
		$user = $this->db->get()->row();

		if ($user) {
			$id_user = $user->id_user;

			// Mengambil keterangan dari tabel log berdasarkan id_user
			$this->db->select('keterangan');
			$this->db->from('log');
			$this->db->where('id_user', $id_user);
			$keterangan = $this->db->get()->row();

			// Passing data ke view
			$data['keterangan'] = $keterangan ? $keterangan->keterangan : null;
			$data['id_pengaduan'] = $id_pengaduan;
			$this->load->view('agt_dashboard', $data); // Ganti dengan nama view Anda
		}
	}
}
