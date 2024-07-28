<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login/login_karyawan';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['login_pengaduan'] = 'Login_pengadu'; //path lain dari login
$route['karyawan'] = 'Login/login_karyawan';
$route['forgot'] = 'forgot';
$route['forgot/reset_password'] = 'forgot/lupa_password';
$route['logout_karyawan'] = 'login/logout_karyawan';
$route['logout'] = 'Login_pengadu/logout';
$route['user/register'] = 'Register/register';


//admin
$route['admin'] = 'admin/Cadm_dashboard';
$route['admin/data_log'] = 'admin/Cadm_log';
$route['admin/data_penilaian'] = 'admin/Cadm_penilaian';
$route['admin/downloadPdf'] = 'admin/Cadm_log/downloadPdf';
$route['admin/hapus_pengaduan/(:num)'] = 'admin/Cadm_log/hapus_pengaduan/$1';
$route['admin/data_lokasi'] = 'admin/Cadm_dataruangtempat';  
$route['admin/data_user'] = 'admin/Cadm_datauser';
$route['admin/data_topsisi'] = 'user/Cpengaduan_masuk';
$route['admin/data_user/upload'] = 'admin/Cadm_datauser/upload';
$route['admin/tambah_ruang'] = 'admin/Cadm_dataruangtempat/tambah_ruang';
$route['admin/edit_ruang'] = 'admin/Cadm_dataruangtempat/edit_ruang';
$route['admin/tambah_tempat'] = 'admin/Cadm_dataruangtempat/tambah_tempat';
$route['admin/edit_tempat'] = 'admin/Cadm_dataruangtempat/edit_tempat';
$route['admin/hapus_ruang/(:num)'] = 'admin/Cadm_dataruangtempat/hapus_ruang/$1';
$route['admin/hapus_tempat/(:num)'] = 'admin/Cadm_dataruangtempat/hapus_tempat/$1';
$route['admin/download'] = 'admin/Cadm_datauser/download';
$route['admin/edit_user'] = 'admin/Cadm_datauser/edit_user';
$route['admin/hapus_user/(:num)'] = 'admin/Cadm_datauser/hapus_user/$1';
$route['admin/ubah_password'] = 'admin/Cadm_datauser/save_password';
$route['admin/tambah_user'] = 'admin/Cadm_datauser/tambah_user';

$route['admin/data_umpanbalik'] = 'admin/Cadm_umpanbalik';
$route['admin/detail_umpanbalik/(:num)'] = 'admin/Cadm_umpanbalik/detail_koor/$1';
$route['admin/konfirmasi'] = 'admin/Cadm_umpanbalik/konfirmasi';
$route['admin/kirim_pengaduan'] = 'admin/Cadm_umpanbalik/kirim';

$route['admin/data_masuk'] = 'admin/Cadm_datamasuk';
$route['admin/proses_topsis'] = 'admin/Cadm_datamasuk/edit_skala_prioritas';
$route['admin/detail_pengaduan/(:num)'] = 'admin/Cadm_datamasuk/detail/$1';
$route['admin/konfirmasi'] = 'admin/Cadm_datamasuk/konfirmasi';

$route['admin/data_kegiatan'] = 'admin/Cadm_kegiatan/index';
$route['admin/tambah_kegiatan'] = 'admin/Cadm_kegiatan/create';
$route['admin/tambah_kegiatan'] = 'admin/Cadm_kegiatan/store';
$route['admin/edit_kegiatan/(:num)'] = 'admin/Cadm_kegiatan/edit/$1';
$route['admin/edit_kegiatan/(:num)'] = 'admin/Cadm_kegiatan/update/$1';
$route['admin/hapus_kegiatan/(:num)'] = 'admin/Cadm_kegiatan/delete/$1';

$route['admin/data_umum'] = 'admin/Cadm_dataumum/index';
$route['admin/tambah_umum'] = 'admin/Cadm_dataumum/create';
$route['admin/tambah_umum'] = 'admin/Cadm_dataumum/store';
$route['admin/edit_umum/(:num)'] = 'admin/Cadm_dataumum/edit/$1';
$route['admin/edit_umum/(:num)'] = 'admin/Cadm_dataumum/update/$1';

$route['admin/hapus_log/(:num)'] = 'admin/Cadm_log/delete/$1';
$route['admin/detail_log/(:num)'] = 'admin/Cadm_log/detail/$1';

$route['admin/download-pdf'] = 'admin/Cadm_pdf/download_pdf';

$route['admin/riwayat_pengaduan'] = 'admin/Cadm_riwayatpeng';

$route['admin/data_chart'] = 'admin/Cadm_penilaian/chart';

// Route untuk mendapatkan jumlah pengaduan yang belum dibaca
$route['admin/get_unread_count'] = 'Cadm_dashboard/get_unread_count';

// Route untuk mendapatkan pengaduan yang belum dibaca
$route['admin/get_unread_pengaduan'] = 'Cadm_dashboard/get_unread_pengaduan';

$route['admin/konfirmasi/(:num)'] = 'admin/Cadm_datamasuk/konfirmasi/$1';
// $route['admin/konfirmasi'] = 'admin/Cadm_datamasuk/konfirmasi';


//user
$route['user'] = 'user/Cform';
$route['user/home'] = 'user/Cform/home';
$route['user/riwayat_pengaduan'] = 'user/Criwayat_pengaduanuser';
$route['user/insert_data'] = 'user/Cform/tambah';
$route['user/ubah_password'] = 'user/Cform/save_password';


//anggota
$route['anggota'] = 'anggota/Cagt_dashboard';
$route['anggota/data_umum'] = 'anggota/Cagt_dataumum';
$route['anggota/data_diri'] = 'anggota/Cagt_datadiri';
$route['anggota/data_pelapor'] = 'anggota/Cagt_datapelapor';
$route['anggota/insert_data'] = 'anggota/Cagt_datapelapor/tambah';
$route['anggota/data_penilaian'] = 'anggota/Cagt_penilaian';
$route['anggota/tambah_penilaian'] = 'anggota/Cagt_penilaian/create';
$route['anggota/tambah_penilaian'] = 'anggota/Cagt_penilaian/store';
$route['anggota/riwayat_pengaduan'] = 'anggota/Cagt_riwayatpeng';
$route['anggota/data_kegiatan'] = 'anggota/Cagt_kegiatan/index';


//analis
$route['analis'] = 'analis/Canalis_dashboard';
$route['analis/data_umum'] = 'analis/Canalis_dataumum';
$route['analis/data_user'] = 'analis/Canalis_datauser';
$route['analis/data_log'] = 'analis/Canalis_log';
$route['analis/data_penilaian'] = 'analis/Canalis_penilaian';
$route['analis/data_masuk'] = 'analis/Cpengaduan_masuk';
$route['analis/data_umpanbalik'] = 'analis/Canalis_umpanbalik';
$route['analis/detail_pengaduan_umpanbalik/(:num)'] = 'analis/Canalis_umpanbalik/detail_koor/$1';
$route['analis/edit_user'] = 'analis/Canalis_datauser/edit_user';
$route['analis/hapus_user/(:num)'] = 'analis/Canalis_datauser/hapus_user/$1';
$route['analis/tambah_user'] = 'analis/Canalis_datauser/tambah_user';
$route['analis/proses_topsis'] = 'analis/Cpengaduan_masuk/topsis';
$route['analis/detail_pengaduan/(:num)'] = 'analis/Cpengaduan_masuk/detail/$1';
$route['analis/riwayat_pengaduan'] = 'analis/Canalis_riwayatpeng';
$route['analis/kirim_pengaduan'] = 'analis/Cpengaduan_masuk/kirim';
$route['analis/ubah_pengaduan'] = 'analis/Cpengaduan_masuk/ubah';
$route['analis/buat_kategori'] = 'analis/Cpengaduan_masuk/tambah_kategori';
$route['analis/edit_skala_prioritas'] = 'analis/Cpengaduan_masuk/edit_skala_prioritas';
$route['analis/update_status'] = 'analis/Cpengaduan_masuk/update_status';
$route['analis/riwayat_deleted/(:num)'] = 'analis/Canalis_riwayatpeng/deleted/$1';
$route['analis/ubah_password_r'] = 'analis/Canalis_riwayatpeng/save_password';
$route['analis/ubah_password_m'] = 'analis/Cpengaduan_masuk/save_password';
$route['analis/ubah_password_k'] = 'analis/Ckategori_jenis/save_password';
$route['analis/ubah_password_l'] = 'analis/Claporan_analis/save_password';
$route['analis/laporan'] = 'analis/Claporan_analis';
$route['analis/cetak'] = 'analis/Claporan_analis/print_laporan';
$route['analis/kelola'] = 'analis/Ckategori_jenis';
$route['analis/tambah_kategori'] = 'analis/Ckategori_jenis/tambah_kategori';
$route['analis/edit_kategori'] = 'analis/Ckategori_jenis/edit_kategori';
$route['analis/tambah_jenis'] = 'analis/Ckategori_jenis/tambah_jenis';
$route['analis/edit_jenis'] = 'analis/Ckategori_jenis/edit_jenis';
$route['analis/hapus_kategori/(:num)'] = 'analis/Ckategori_jenis/hapus_kategori/$1';
$route['analis/hapus_jenis/(:num)'] = 'analis/Ckategori_jenis/hapus_jenis/$1';
//$route['analis/konfirmasi/(:num)'] = 'analis/Cpengaduan_masuk/konfirmasi/$1';
// $route['analis/konfirmasi'] = 'analis/Cpengaduan_masuk/konfirmasi';
$route['analis/data_diri'] = 'analis/Canalis_datadiri';
$route['analis/data_pelapor'] = 'analis/Canalis_datapelapor';
$route['analis/insert_data'] = 'analis/Canalis_datapelapor/tambah';
$route['analis/data_lokasi'] = 'analis/Canalis_dataruangtempat'; 
$route['analis/data_kegiatan'] = 'analis/Canalis_kegiatan/index';

$route['analis/data_penilaian'] = 'analis/Canalis_penilaian';
$route['analis/tambah_penilaian'] = 'analis/Canalis_penilaian/create';
$route['analis/tambah_penilaian'] = 'analis/Canalis_penilaian/store';


//koor
$route['koordinator'] = 'koor/Ckpengaduan_masuk';
$route['koordinator/riwayat'] = 'koor/Ck_riwayatpeng';
$route['koordinator/detail_pengaduan_koor/(:num)'] = 'koor/Ckpengaduan_masuk/detail_koor/$1';
//$route['koordinator/konfirmasi/(:num)'] = 'koor/Ckpengaduan_masuk/konfirmasi/$1';
$route['koordinator/konfirmasi'] = 'koor/Ckpengaduan_masuk/konfirmasi';
$route['koordinator/ubah_password_riwayat'] = 'analis/Ck_riwayatpeng/save_password';
$route['koordinator/ubah_password_masuk'] = 'koor/Ckpengaduan_masuk/save_password';
$route['koordinator/kirim_pengaduan'] = 'koor/Ckpengaduan_masuk/kirim';

$route['manajemen'] = 'Laporan';
$route['manajemen/rekap'] = 'Laporan/rekap';
$route['manajemen/ubah_password'] = 'Laporan/save_password';

