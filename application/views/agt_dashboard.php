<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css") ?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css") ?> rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css") ?>>
    <style>
        .notification-icon {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .notification-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 12px;
        }

        .notification-list {
            display: none;
            position: absolute;
            right: 0;
            background: white;
            border: 1px solid #ccc;
            width: 300px;
            max-height: 400px;
            overflow-y: auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .notification-list ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .notification-list li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .notification-list li:last-child {
            border-bottom: none;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleNotifications() {
            console.log("Icon clicked!");
            var notificationList = document.getElementById('notification-list');
            if (notificationList.style.display === 'none' || notificationList.style.display === '') {
                notificationList.style.display = 'block';
            } else {
                notificationList.style.display = 'none';
            }
        }

        window.onclick = function(event) {
            if (!event.target.matches('.notification-icon') && !event.target.closest('.notification-list')) {
                var notificationList = document.getElementById('notification-list');
                if (notificationList.style.display === 'block') {
                    notificationList.style.display = 'none';
                }
            }
        }

        function fetchUnreadCount() {
            $.ajax({
                url: '<?php echo base_url("Cadm_dashboard/get_unread_count"); ?>',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('.notification-count').text(data.unread_count);
                }
            });
        }

        function fetchUnreadPengaduan() {
            $.ajax({
                url: '<?php echo base_url("Cadm_dashboard/get_unread_pengaduan"); ?>',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var list = $('#notification-list ul');
                    list.empty();
                    if (data.length > 0) {
                        data.forEach(function(pengaduan) {
                            list.append('<li>' + pengaduan.nama + '</li>');
                        });
                    } else {
                        list.append('<li>Tidak ada pengaduan baru.</li>');
                    }
                }
            });
        }

        $(document).ready(function() {
            fetchUnreadCount();
            fetchUnreadPengaduan();
            setInterval(fetchUnreadCount, 5000); // Poll every 5 seconds
            setInterval(fetchUnreadPengaduan, 5000); // Poll every 5 seconds
        });
    </script>
</head>
<?php
$id_user = $this->session->userdata('id_user');

$this->db->select('log.id_pengaduan, log.status, log.keterangan, log.timestamp');
$this->db->from('log');
$this->db->where('log.id_user', $id_user); // Filter berdasarkan id_user
$data = $this->db->get()->row();

// die(var_dump(($result)));
// $data = $this->db->get_where('log', ['id_pengaduan'])->row();
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #204060">
            <div class="navbar-header">
                <a href="admin" style="color: #ffffff; font-size: 20px;"><img src=<?php echo base_url("img/logo.png") ?> style="width: auto; height: 50px;"><b> Politeknik Negeri Ujung Pandang</b></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pengguna'); ?></i>
                    </a> -->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a data-toggle="modal" data-target="#settingModal"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li><a href="<?php echo base_url('logout_karyawan') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>

            <ul class="nav navbar-top-links navbar-right">
                <a class="fa fa-bell fa-3x" style="color: orange" data-toggle="modal" data-target="#detail<?php echo $data->id_pengaduan ?? '';?>"></a>

            </ul>

            <!-- /.navbar-top-links -->

            <!--- user panel -->
            <section class="sidebar">

            </section>

            <!-- MENU -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href=<?php echo base_url('anggota') ?>><i class="fa fa-dashboard"></i><b>&nbsp; Dashboard</b></a>
                        </li>
                        <!-- <li>
                            <a href=<?php echo base_url('anggota/data_umum') ?>><i class="fa fa-users"></i><b>&nbsp; Data Umum</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/data_diri') ?> ><i class="fa fa-user"></i><b>&nbsp; Data Diri</b></a>
                        </li> -->
                        <li>
                            <a href=<?php echo base_url('anggota/data_pelapor') ?>><i class="fa fa-archive"></i><b>&nbsp; Pelaporan</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/data_umpanbalik') ?>><i class="fa fa-envelope"></i><b>&nbsp; Data Masuk</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/data_penilaian') ?>><i class="fa fa-star"></i><b>&nbsp; Penilaian</b></a>
                        </li>
                        <!-- <li>
                            <a href=<?php echo base_url('anggota/data_kegiatan') ?>><i class="fa fa-image"></i><b>&nbsp; Foto Kegiatan</b></a>
                        </li> -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <center>
                    <div class="col-lg-12">
                        <!-- <h1 class="page-header">Halo, <?php echo $this->session->userdata('nama_pengguna') ?? ''; ?></a></h1> -->
                        <h1>Selamat Datang Di Web Pengaduan</h1>
                        <img src=<?php echo base_url("img/logo.png") ?> style="width: auto; height: 100px; margin-bottom: 30px"> </br>
                    </div>
                    <div class="col-lg-12">
                    </div>
                </center>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">

            </div>
            <!-- /.row -->
            <div class="row">
                <h1 class="page-header"></a>
                </h1>
            </div>



            <div class="modal modal-primary fade" id="detail<?php echo $data->id_pengaduan ?? null ?>" style="margin-top: 5%;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <center>
                                <h4 class="modal-title">NOTIFIKASI PENGADUAN</h4>
                            </center>
                        </div>
                        <center>
                            <div class="modal-body">
                                <div class="row text-center">
                                    <div class="col-md-2">
                                        <label>Tanggal</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Jam</label>
                                    </div>
                                    <!-- <div class="col-md-1">
                                        <label>Status</label>
                                    </div> -->
                                    <div class="col-md-3">
                                        <label>Notifikasi Admin</label>
                                    </div>
                                </div>
                                <?php
                                // Load model dan ambil data log
                                $this->load->model('Madm_log');
                                $id_pengaduan = $data?->id_pengaduan == null ? 0 : $data->id_pengaduan;
                                // var_dump($id_pengaduan);
                                if ($id_pengaduan == 0) {
                                    $log_activity = null;
                                } else {
                                    $log_activity = $this->Madm_log->detail_log($id_pengaduan);
                                }
                                // Cek jika $log_activity tidak null atau kosong
                                if (!empty($log_activity) && isset($data->id_pengaduan)) {
                                    $j = 1;
                                    foreach ($log_activity as $log) {
                                ?>
                                        <div class="row text-center">
                                            <div class="col-md-2">
                                                <p><?php echo date("d F Y", strtotime($log->timestamp)) ?></p>
                                            </div>
                                            <div class="col-md-1">
                                                <p><?php echo date("H:i:s", strtotime($log->timestamp)) ?></p>
                                            </div>
                                            <div class="col-md-1">
                                                <!-- Status Badge -->
                                                <!-- Add status badge based on the value of $log->status -->
                                            </div>
                                            <div class="col-md-3">
                                                <p><?php echo $log->keterangan ?></p>
                                            </div>
                                        </div>
                                    <?php
                                        $j++;
                                    }
                                } else {
                                    // Tampilkan pesan jika log kosong atau tidak ada
                                    ?>
                                    <div class="row text-center">
                                        <h5>Belum ada notifikasi dari admin</h5>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </center>
                        <div class="modal-footer">
                            <button style="margin-left: 45%" type="button" class="btn btn-warning pull-left" data-dismiss="modal">selesai
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal edit user -->

            <div class="modal modal-primary fade" id="settingModal" style="margin-top: 5%">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 75%; margin-left: 15%">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <center>
                                <h4 class="modal-title">GANTI PASSWORD</h4>
                            </center>
                        </div>

                        <form method="POST" action="<?php echo base_url('admin/ubah_password') ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Password lama :</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="old" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Password baru :</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="new" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Konfirmasi :</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="re_new" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- modal setting -->

            <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js") ?>></script>
            <script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js") ?>></script>
            <script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js") ?>></script>
            <script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js") ?>></script>
            <script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js") ?>></script>
            <script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js") ?>></script>
            <script src=<?php echo base_url("assets/dist/js/sb-admin-2.js") ?>></script>

            <script type="text/javascript">
                $(function() {
                    $('#example1').DataTable()
                    $('#example2').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'ordering': false,
                        'info': true,
                        'autoWidth': false
                    })
                })
            </script>

</html>