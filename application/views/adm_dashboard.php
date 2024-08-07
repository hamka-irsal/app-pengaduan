<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
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

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #204060">
            <div class="navbar-header">
                <a href="admin" style="color: #ffffff; font-size: 20px;"><img src=<?php echo base_url("img/logo.png")?> style="width: auto; height: 50px;"><b> Politeknik Negeri Ujung Pandang</b></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pengguna'); ?></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a data-toggle="modal" data-target="#settingModal"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li><a href="<?php echo base_url('logout_karyawan')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            <!-- <ul class="nav navbar-top-links navbar-right" style="margin-top: 20px; margin-right:20px;">
            <div class="notification-icon" onclick="toggleNotifications()">
            <i class="fas fa-bell"></i>
                <span class="notification-count"><?php echo $unread_count; ?></span>
            </div>

            <div id="notification-list" class="notification-list">
                <ul>
                    <?php if (count($pengaduan) > 0) : ?>
                        <?php foreach ($pengaduan as $p) : ?>
                            <li><?php echo $p->nama; ?></li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li>Tidak ada pengaduan baru.</li>
                    <?php endif; ?>
                </ul>
            </div>
            </ul> -->
            <!-- /.navbar-top-links -->

            <!--- user panel -->
            <section class="sidebar">

            </section>

            <!-- MENU -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href=<?php echo base_url('admin')?>><i class="fa fa-dashboard"></i><b>&nbsp; Dashboard</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_umum')?>><i class="fa fa-users"></i><b>&nbsp; Data Umum</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_user')?> ><i class="fa fa-user"></i><b>&nbsp; Data Pengguna</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_log')?>><i class="fa fa-archive"></i><b>&nbsp; Pelaporan</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/riwayat_pengaduan')?>><i class="fa fa-table"></i><b>&nbsp; Riwayat Pelaporan</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_masuk')?>><i class="fa fa-folder"></i><b>&nbsp; Data Masuk</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_penilaian')?> ><i class="fa fa-star"></i><b>&nbsp; Penilaian</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_umpanbalik')?>><i class="fa fa-envelope"></i><b>&nbsp; Umpan Balik</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_topsis')?>><i class="fa fa-atom"></i><b>&nbsp; SPK Topsis</b></a>
                        </li>
                         <li>
                            <a href=<?php echo base_url('admin/data_lokasi')?>><i class="fa fa-folder"></i><b>&nbsp; Data Lokasi</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('admin/data_kegiatan')?>><i class="fa fa-image"></i><b>&nbsp; Foto Kegiatan</b></a>
                        </li>
                       <!-- <li>
                            <a href=<?php echo base_url('admin/data_sasaranmutu')?>><i class="fa fa-folder"></i><b>&nbsp; Sasaran Mutu</b></a>
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
                    <h1 class="page-header">Halo, <?php echo $this->session->userdata('nama_pengguna'); ?></a></h1>
                    <h1>Selamat Datang Di Web Pengaduan</h1>
                    <img src=<?php echo base_url("img/logo.png")?> style="width: auto; height: 100px; margin-bottom: 30px">
                </div>

               
                </center>
                            <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <h1 class="page-header"></a>
            </h1>
            </div>

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

                    <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js")?> ></script>
                    <script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

                    <script type="text/javascript">
                        $(function () {
                            $('#example1').DataTable()
                            $('#example2').DataTable({
                              'paging'      : true,
                              'lengthChange': false,
                              'ordering'    : false,
                              'info'        : true,
                              'autoWidth'   : false
                          })
                        })
                    </script>
        </html>
