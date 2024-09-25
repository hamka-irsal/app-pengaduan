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
		$this->load->helper('url','form');
        $this->load->library('phpmailer_lib');
        $this->load->library('email');
        $this->load->config('email');
		$this->load->library('pdf');
        
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

    // public function kirim_notifikasi_pengaduan_selesai($id_pengaduan)
    // {
    //     // Ambil data pengaduan
    //     // $this->load->model('Madm_pengaduanmsk');
    //     $pengaduan = $this->Madm_pengaduanmsk->get_pengaduan_by_id($id_pengaduan);
        
    //     if ($pengaduan) {
    //         // Konfigurasi email
    //         $this->load->library('email');
    //         $this->email->from('no-reply@yourdomain.com', 'Sistem Pengaduan');
    //         $this->email->to($pengaduan->email); // Email pengadu yang diambil dari database
    //         $this->email->subject('Pengaduan Selesai');
            
    //         // Isi pesan email
    //         $message = "
    //             <p>Yth. {$pengaduan->nama_pengguna},</p>
    //             <p>Pengaduan Anda dengan nomor <strong>{$pengaduan->id_pengaduan}</strong> telah selesai kami kerjakan.</p>
    //             <p>Terima kasih atas kesabaran Anda.</p>
    //             <br>
    //             <p>Salam,</p>
    //             <p>Tim Pengaduan</p>
    //         ";
    //         $this->email->message($message);
            
    //         // Kirim email
    //         if ($this->email->send()) {
    //             return true;
    //         } else {
    //             log_message('error', $this->email->print_debugger());
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }

    // public function update_status_pengaduan($id_pengaduan)
    // {
    //     $status = $this->input->post('status'); // Status yang dikirim dari form

    //     if ($status == 'SELESAI') {
    //         // Update status pengaduan menjadi SELESAI
    //         $this->Madm_pengaduanmsk->update_status($id_pengaduan, 'SELESAI');

    //         // Kirim notifikasi email
    //         $this->kirim_notifikasi_pengaduan_selesai($id_pengaduan);
    //     }

    //     redirect('admin/data_laporan/'.$id_pengaduan);
    // }

    //  public function send_email_notification($email, $nama_pengadu, $id_pengaduan) {
    //     // Inisialisasi konfigurasi email
    //     $this->email->initialize(array(
    //         'protocol' => 'smtp',
    //         'smtp_host' => $this->config->item('smtp_host'),
    //         'smtp_user' => $this->config->item('smtp_user'),
    //         'smtp_pass' => $this->config->item('smtp_pass'),
    //         'smtp_port' => $this->config->item('smtp_port'),
    //         'mailtype' => $this->config->item('mailtype'),
    //         'charset'  => $this->config->item('charset'),
    //         'newline'  => $this->config->item('newline')
    //     ));

    //     // Pengaturan email
    //     $this->email->from('noreply@yourdomain.com', 'Sistem Pengaduan Kampus');
    //     $this->email->to($email);
    //     $this->email->subject('Pengaduan Selesai');
    //     $message = "<h3>Pengaduan Selesai</h3><p>Halo, {$nama_pengadu},</p><p>Pengaduan Anda dengan ID #{$id_pengaduan} telah selesai kami kerjakan.</p>";
    //     $this->email->message($message);

    //     // Kirim email
    //     if ($this->email->send()) {
    //         return true;
    //     } else {
    //         show_error($this->email->print_debugger());
    //         return false;
    //     }
    // }

    // public function update_pengaduan_status($id_pengaduan)
    // {
    //     // Ubah status pengaduan menjadi 'SELESAI'
    //     $data = array('status' => 'selesai');
        
    //     // Update status di database
    //     $this->db->where('id_pengaduan', $id_pengaduan);
    //     if ($this->db->update('pengaduan', $data)) {
    //         // Dapatkan email dan nama pengadu untuk pengiriman notifikasi
    //         $this->db->select('email, nama_pengguna');
    //         $this->db->from('pengaduan');
    //         $this->db->where('id_pengaduan', $id_pengaduan);
    //         $pengadu = $this->db->get()->row();
            
    //         // Panggil fungsi untuk mengirim email
    //         $this->send_email_notification($pengadu->email, $pengadu->nama_pengguna, $id_pengaduan);
            
    //         echo "Status pengaduan diperbarui dan notifikasi dikirim.";
    //     } else {
    //         echo "Gagal memperbarui status pengaduan.";
    //     }
    // }

    // public function send_completion_notification($email_pengadu, $pengaduan_id)
    // {
    //     $this->load->library('email');

    //     $this->email->from('hamkairsal23@gmail.com', 'Admin');
    //     $this->email->to($email_pengadu);
    //     $this->email->subject('Pengaduan Selesai Dikerjakan');
        
    //     $message = "
    //     <h3>Pengaduan Anda dengan ID: {$pengaduan_id} telah selesai dikerjakan</h3>
    //     <p>Silakan periksa status pengaduan Anda di sistem kami.</p>
    //     <p>Terima kasih telah menggunakan layanan kami.</p>";
        
    //     $this->email->message($message);

    //     if ($this->email->send()) {
    //         echo 'Email notifikasi berhasil dikirim.';
    //     } else {
    //         echo 'Gagal mengirim email notifikasi.';
    //         show_error($this->email->print_debugger());
    //     }
    // }

    // public function selesai_pengaduan($pengaduan_id)
    // {
    //     // Logika untuk menandai pengaduan sebagai selesai
    //     $this->Madm_pengaduanmsk->update_status($pengaduan_id, 'selesai');

    //     // Ambil email pengadu dari database
    //     $pengadu = $this->Madm_pengaduanmsk->get_pengadu_by_id($pengaduan_id);
    //     $email_pengadu = $pengadu->email;

    //     // Kirim notifikasi email
    //     $this->send_completion_notification($email_pengadu, $pengaduan_id);

    //     // Redirect atau tampilkan pesan sukses
    //     redirect('admin/data_laporan');
    // }



    // public function kirim_notifikasi_pengaduan_selesai($id_pengaduan) {
    //     // Ambil data pengaduan berdasarkan id
    //     // $this->load->model('Madm_pengaduanmsk');
    //     $pengaduan = $this->Madm_pengaduanmsk->get_pengaduan_by_id($id_pengaduan);
    
    //     if ($pengaduan) {
    //         // Konfigurasi email
    //         $this->load->library('email');
    //         // $this->email->initialize($config);
    
    //         // Atur penerima, subjek, dan pesan
    //         $this->email->from('hamkairsal23@gmail.com', 'Sistem Pengaduan');
    //         $this->email->to($pengaduan->email);  // Email pengadu
            
    //         $this->email->subject('Pengaduan Anda Telah Selesai');
    //         $this->email->message('Halo, pengaduan Anda dengan ID ' . $id_pengaduan . ' telah selesai ditangani. Terima kasih atas laporannya.');
    
    //         // Kirim email
    //         if ($this->email->send()) {
    //             return true;  // Berhasil kirim
    //         } else {
    //             return false;  // Gagal kirim
    //         }
    //     } else {
    //         return false;  // Data pengaduan tidak ditemukan
    //     }
    // }

    // public function update_status_pengaduan($id_pengaduan) {
    //     // Ubah status pengaduan menjadi SELESAI
    //     // $this->load->model('Madm_pengaduanmsk');
    //     $update_status = $this->Madm_pengaduanmsk->update_status($id_pengaduan, 'selesai');
    
    //     if ($update_status) {
    //         // Kirim notifikasi email setelah status diubah menjadi SELESAI
    //         $this->kirim_notifikasi_pengaduan_selesai($id_pengaduan);
            
    //         // Redirect ke halaman pengaduan dengan pesan sukses
    //         $this->session->set_flashdata('message', 'Pengaduan telah selesai dan email notifikasi telah dikirim.');
    //         redirect('admin/data_laporan');
    //     } else {
    //         // Redirect ke halaman pengaduan dengan pesan gagal
    //         $this->session->set_flashdata('message', 'Gagal menyelesaikan pengaduan.');
    //         redirect('admin/data_laporan');
    //     }
    // }

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
