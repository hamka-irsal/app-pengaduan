<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Cadm_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madm_pengaduanmsk');
        $this->load->model('Madm_log');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('phpmailer_lib');
        $this->load->library('email');
        
    }

    public function index()
	{
		$data['log_activity']=$this->Madm_log->log_activity();
		$data['level']=$this->Madm_log->level();
		// $data['pengaduan']=$this->Madm_log->pengaduan();
		$this->load->view('adm_log',$data);
	}

    public function selesai()
    {
        $data['pengaduan_selesai'] = $this->Madm_pengaduanmsk->get_selesai_pengaduan();
        $this->load->view('adm_hasillaporan', $data);
    }

    public function cari() {
        $data['pengaduan_selesai'] = [];

        if ($this->input->post('submit')) {
            $startDate = $this->input->post('start_date');
            $endDate = $this->input->post('end_date');

            // Validasi input tanggal
            if ($startDate && $endDate) {
                $data['pengaduan_selesai'] = $this->Madm_pengaduanmsk->getPelaporanByDateRange($startDate, $endDate);
            } else {
                $data['error'] = 'Tanggal mulai dan akhir harus diisi!';
            }
        }

        $this->load->view('adm_carihasil', $data);
    }

    public function delete($id) {
        $this->Madm_log->delete_log($id);
        redirect('admin/data_laporan');
    }

    public function kirim_notifikasi_pengaduan_selesai($id_pengaduan) {
        // Ambil data pengaduan berdasarkan id
        // $this->load->model('Madm_pengaduanmsk');
        $pengaduan = $this->Madm_pengaduanmsk->get_pengaduan_by_id($id_pengaduan);
    
        if ($pengaduan) {
            // Konfigurasi email
            $this->load->library('email');
            // $this->email->initialize($config);
    
            // Atur penerima, subjek, dan pesan
            $this->email->from('hamkairsal23@gmail.com', 'Sistem Pengaduan');
            $this->email->to($pengaduan->email);  // Email pengadu
            
            $this->email->subject('Pengaduan Anda Telah Selesai');
            $this->email->message('Halo, pengaduan Anda dengan ID ' . $id_pengaduan . ' telah selesai ditangani. Terima kasih atas laporannya.');
    
            // Kirim email
            if ($this->email->send()) {
                return true;  // Berhasil kirim
            } else {
                return false;  // Gagal kirim
            }
        } else {
            return false;  // Data pengaduan tidak ditemukan
        }
    }

    public function update_status_pengaduan($id_pengaduan) {
        // Ubah status pengaduan menjadi SELESAI
        // $this->load->model('Madm_pengaduanmsk');
        $update_status = $this->Madm_pengaduanmsk->update_status($id_pengaduan, 'selesai');
    
        if ($update_status) {
            // Kirim notifikasi email setelah status diubah menjadi SELESAI
            $this->kirim_notifikasi_pengaduan_selesai($id_pengaduan);
            
            // Redirect ke halaman pengaduan dengan pesan sukses
            $this->session->set_flashdata('message', 'Pengaduan telah selesai dan email notifikasi telah dikirim.');
            redirect('admin/data_laporan');
        } else {
            // Redirect ke halaman pengaduan dengan pesan gagal
            $this->session->set_flashdata('message', 'Gagal menyelesaikan pengaduan.');
            redirect('admin/data_laporan');
        }
    }

    // public function kirim_email_pengaduan($id_pengaduan) {
    //     // $this->email->initialize($config);
        
    //     $pengaduan = $this->Madm_pengaduanmsk->get_pengaduan_by_id($id_pengaduan);
        
    //     $mail = $this->phpmailer_lib->load();
        
    //     // Set SMTP Configuration
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.gmail.com';
    //     $mail->SMTPAuth = true;
    //     $mail->Username = 'hamkairsal23@gmail.com'; // Ganti dengan email Anda
    //     $mail->Password = '12I1343LEI'; // Ganti dengan password email Anda
    //     $mail->SMTPSecure = 'ssl';
    //     $mail->Port = 465;
        
    //     // Set email sender
    //     $mail->setFrom('hamkairsal23@gmail.com', 'Nama Aplikasi');
        
    //     // Add a recipient
    //     if ($pengaduan) {
    //         // Jika data pengaduan ditemukan
    //         $mail->addAddress($pengaduan->email); // Pastikan propertinya sesuai
    //     } else {
    //         // Tangani error jika data pengaduan tidak ditemukan
    //         $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan.');
    //         redirect('admin/data_laporan');
    //     }
        
    //     // Email subject and body content
    //     $mail->Subject = 'Pengaduan Anda Sudah Selesai';
    //     $mail->isHTML(true);
    //     $mail->Body = 'Hai ' . $pengaduan->nama_pengguna . ', pengaduan Anda dengan ID ' . $pengaduan->id_pengaduan . ' telah selesai dikerjakan. Silakan cek statusnya di aplikasi kami.';
        
    //     // Send email
    //     if(!$mail->send()) {
    //         echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    //     } else {
    //         echo 'Notifikasi email berhasil dikirim.';
    //     }
    // }
    

    // public function kirim_notifikasi_email($user_email, $subject, $message) {
    //     $this->load->library('email');
        
    //     $config = array(
    //         'protocol'  => 'smtp',
    //         'smtp_host' => 'ssl://smtp.googlemail.com',
    //         'smtp_user' => 'hamkairsal23@gmail.com',
    //         'smtp_pass' => '12I1343LEI',
    //         'smtp_port' => 465,
    //         'mailtype'  => 'html',
    //         'charset'   => 'utf-8',
    //         'wordwrap'  => TRUE,
    //         'newline'   => "\r\n"
    //     );
        
    //     $this->email->initialize($config);
        
    //     // Set pengirim, penerima, subject, dan isi pesan
    //     $this->email->from('hamkairsal23@gmail.com', 'Nama Aplikasi');
    //     $this->email->to($user_email); 
    //     $this->email->subject($subject);
    //     $this->email->message($message);
        
    //     if ($this->email->send()) {
    //         return true;
    //     } else {
    //         // Cek jika ada error dalam pengiriman
    //         show_error($this->email->print_debugger());
    //         return false;
    //     }
    // }
    
}
