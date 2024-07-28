<?php
require APPPATH . '/libraries/BaseController.php';
class Canalis_umpanbalik extends BaseController 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_umpanbalik');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		//var_dump($this->session->userdata('level'));exit;
		$data['masuk']= $this->Madm_umpanbalik->pengaduan_masuk();
		$this->load->view('analis_umpanbalik',$data);
	}

	public function detail_koor($id)
	{
		$data['detail_pengaduan']=$this->Madm_umpanbalik->detail_koor($id);
		$this->load->view('detail_umpanbalik',$data);

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
		$this->Madm_umpanbalik->konfirmasi($data);

		$data2 = array(
			'status'=>'selesai'
		);
		$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',$data2);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Pengaduan telah dikonfirmasi.');

		redirect('analis/data_umpanbalik');
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('analis/data_umpanbalik');
	  }
	  	else
	  {
	   $cek_old = $this->Madm_umpanbalik->cek_old();

	   if (count($cek_old) == 0){
		    $this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
		    
		    redirect('analis/data_umpanbalik');
	   }
	   	else
	   {
		    $this->Madm_umpanbalik->save();
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
		$this->Madm_umpanbalik->kirim($data);

		$data2 = array(
			'status'=>'diproses'
		);
		$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',$data2);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Pengaduan telah terkirim.');

		redirect('analis/data_umpanbalik');
	}

}

?>