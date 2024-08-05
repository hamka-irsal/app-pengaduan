<?php
require APPPATH . '/libraries/BaseController.php';
class Cadm_datamasuk extends BaseController 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_datamasuk');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		//var_dump($this->session->userdata('level'));exit;
		$data['masuk']= $this->Madm_datamasuk->pengaduan_masuk();
		$this->load->view('adm_datamasuk',$data);
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
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'id_pengaduan'=>$id_pengaduan,
			'keterangan'=>$keterangan,
			'id_user'=>$id_user,
			'status'=>'selesai'
		);
		$this->Madm_datamasuk->konfirmasi($data);

		$data2 = array(
			'status'=>'selesai'
		);
		$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',$data2);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Pengaduan telah dikonfirmasi.');

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
			redirect('adm_datamasuk');
	  }
	  	else
	  {
	   $cek_old = $this->Madm_datamasuk->cek_old();

	   if (count($cek_old) == 0){
		    $this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
		    
		    redirect('adm_datamasuk');
	   }
	   	else
	   {
		    $this->Madm_datamasuk->save();
		    $this->session->sess_destroy();
		    $this->session->set_flashdata('success','Password anda telah berhasil diubah' );
		    
		    redirect('karyawan');
	   }//end if valid_user
	}
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
		$this->Madm_datamasuk->kirim($data);

		$data2 = array(
			'status'=>'diproses'
		);
		$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',$data2);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Pengaduan telah terkirim.');

		redirect('admin/data_masuk');
	}

}

?>