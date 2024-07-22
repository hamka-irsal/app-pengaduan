<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_datamasuk extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_datamasuk');
		$this->load->helper('url','form');
		// $this->load->model('Pengaduan_model');
		$this->isLoggedIn();
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['pengaduan']=$this->Madm_datamasuk->pengaduan_masuk($id_user);
		$this->load->view('adm_datamasuk',$data);
		// $this->load->view('pengaduan_list');
	}

	public function detail($id)
	{
		$data['kategori']=$this->Madm_datamasuk->kategori();
		$data['detail_pengaduan']=$this->Madm_datamasuk->detail_pengaduan($id);
		$data['level']=$this->Madm_datamasuk->level();	//ke level tujuan

		$this->load->view('detail_pengaduan',$data);
	}

	public function ubah()
	{
		$id_pengaduan = $this->input->post('id_pengaduan');
		
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
		);
		$this->Madm_datamasuk->ubah($data,$id_pengaduan);

		redirect('admin/detail_pengaduan/'.$id_pengaduan);
	}

	public function update_status($id_pengaduan,$status)
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan',array('status'=>"diproses"));
	}

	public function tambah_kategori()
	{
		$kategori = $this->input->post('kategori');
		$id_pengaduan = $this->input->post('id_pengaduan');

		$data = array(
			'kategori' => strtolower($kategori)

		);
		$this->Madm_datamasuk->simpan($data);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Kategori baru telah ditambahkan.');

		redirect('admin/detail_pengaduan/'.$id_pengaduan);
	}

	public function tambah_pengaduan()
	{
		$skala_prioritas = $this->input->post('skala_prioritas');
		$nilai_prioritas = $this->input->post('nilai_prioritas');
		$id_pengaduan = $this->input->post('id_pengaduan');

		$data = array(
			'skala_prioritas' => strtolower($skala_prioritas),
			'nilai_prioritas' => strtolower($nilai_prioritas),
			
		);
		$this->Madm_datamasuk->simpan($data);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Skala Prioritas baru telah diubah.');

		redirect('admin/data_masuk'.$id_pengaduan);
	}

	public function edit_skala_prioritas()
	{
		$id_pengaduan = $this->input->post('id_pengaduan');
		$skala_prioritas = $this->input->post('skala_prioritas');
		$nilai_prioritas = $this->input->post('nilai_prioritas');
		$data = array(
			'skala_prioritas' => $skala_prioritas,
			'nilai_prioritas' => $nilai_prioritas
		);
		$this->Madm_datamasuk->edit_skala_prioritas($data, $id_pengaduan);

		$this->session->set_flashdata('style','success');
		$this->session->set_flashdata('alert','Berhasil!');
		$this->session->set_flashdata('skala_prioritas_msg','Data Skala Prioritas telah berhasil diubah');
		redirect('admin/data_masuk');
	}

	//function mau cek data user
	public function save_password()
	{ 

		$this->load->library('form_validation');

		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

		if($this->form_validation->run() == FALSE)
		{
			redirect('admin/data_masuk');
		}
		else
		{
			$cek_old = $this->Madm_datamasuk->cek_old();

			if (count($cek_old) == 0){
				$this->session->set_flashdata('style', 'danger');
				$this->session->set_flashdata('alert', 'Gagal!');
				$this->session->set_flashdata('message', 'Password lama yang Anda masukkan salah!');

				redirect('admin/data_masuk');
			}
			else
			{
				$this->Madm_datamasuk->save();
				$this->session->sess_destroy();

				redirect('karyawan');
	   		}//end if valid_user
	   	}
	   }

	   public function konfirmasi()
	   {
		   	date_default_timezone_set("Asia/jakarta");
		   	$id_pengaduan = $this->input->post('id_pengaduan');
		   	// $email = $this->input->post('email');
		   	$keterangan = $this->input->post('keterangan');
		   	$pengaduan = $this->db->where('id_pengaduan',$id_pengaduan)->where('status','diproses')->get('log')->row();
		   	$id_user = $this->session->userdata('id_user');
		   	// $rs = $this->Madm_datamasuk->getByEmail($email);

		   	$data = array(
				'id_pengaduan'=>$id_pengaduan,
				'keterangan'=>$keterangan,
				// 'pengaduan'=>$pengaduan,
				'id_user'=>$id_user,
				'status'=>'selesai'
			);

		   	$this->Madm_datamasuk->konfirmasi($data);
		   	
		    $data2 = array(
		   		'status'=>'selesai'
		   	);
		   	$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',$data2);

		   	$config['protocol'] = "smtp";
		   	$config['smtp_host'] = "ssl://smtp.googlemail.com";
		   	$config['smtp_port'] = 465;
		    $config['smtp_user'] = "pegawai@gmail.com"; // ganti dengan emailmu sendiri
		    $config['smtp_pass'] = "pegawai123"; // ganti dengan password emailmu
		    $config['charset'] = "iso-8859-1";
		    $config['mailtype'] = "html";
		    $config['wordwrap'] = "TRUE";
		    $config['crlf'] = "\r\n";
		    $config['newline'] = "\r\n";

		    $this->load->library('email',$config);
		    $this->email->initialize($config);
		    $this->email->set_newline("\r\n");
		    
		    //kirim emailnya ke user tujuan
		    $this->email->from('pegawai@gmail.com', 'Sistem Informasi Pengaduan');
		    $this->email->to($email);
		    $this->email->subject('Notifikasi Konfirmasi');

		    $this->email->message("Pengaduan Anda telah selesai ditangani! Silahkan login dan cek untuk melihat pengaduan yang telah ditangani.");

		    $this->email->send();

		    $this->session->set_flashdata('style','success');
		    $this->session->set_flashdata('alert','Berhasil');
		    $this->session->set_flashdata('message','Pengaduan telah dikonfirmasi!');

		   	redirect('admin/data_masuk');
		}

		public function proses_topsis() {
			try {
				// $pengaduan = $this->Madm_datamasuk->pengaduan_masuk();
				$id_user = $this->session->userdata('id_user');
				$data['pengaduan']=$this->Madm_datamasuk->pengaduan_masuk($id_user);

	
				// Tentukan bobot untuk setiap skala prioritas
				$bobot = [
					'Darurat' => 3,
					'Mendesak' => 2,
					'Jangka Panjang' => 1
				];
	
				// Normalisasi bobot
				$total_bobot = array_sum($bobot);
				foreach ($bobot as $key => $value) {
					$bobot[$key] = $value / $total_bobot;
				}
	
				// Hitung nilai prioritas untuk setiap pengaduan
				foreach ($pengaduan as $p) {
					$nilai_prioritas = $bobot[$p->skala_prioritas];
					$this->Madm_datamasuk->update_prioritas($p->id_pengaduan, $nilai_prioritas);
				}
	
				// Redirect atau tampilkan hasil
				redirect('topsis', $data);
			} catch (Exception $e) {
				log_message('error', $e->getMessage());
				show_error($e->getMessage());
			}
		}
}

