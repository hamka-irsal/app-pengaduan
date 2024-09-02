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
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        h3 {
            color: #4CAF50;
        }
        a {
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
    <style>
        .upload-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        .upload-container h3 {
            margin-bottom: 20px;
            color: #333;
        }
        .upload-container input[type="file"] {
            display: none;
        }
        .upload-container label {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .upload-container label:hover {
            background-color: #45a049;
        }
        .upload-container input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .upload-container input[type="submit"]:hover {
            background-color: #0b7dda;
        }
        .file-name {
            margin-top: 15px;
            color: #555;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .buttons a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            color: #ffffff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .buttons a:hover {
            background-color: #0056b3;
        }

        .login-btn {
            margin-top: 20px;
            font-size: 14px;
            padding: 8px 16px;
            background-color: #28a745;
        }

        .login-btn:hover {
            background-color: #218838;
        }
    </style>
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
            <!-- /.navbar-top-links -->

            <!--- user panel -->
            <section class="sidebar">

            </section>

            <!-- MENU -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href=<?php echo base_url('analis')?>><i class="fa fa-dashboard"></i><b>&nbsp; Dashboard</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/cek_lapkeuangan')?>><i class="fa fa-folder"></i><b>&nbsp; Laporan Keuangan</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/cek_lapbulanan')?> ><i class="fa fa-folder"></i><b>&nbsp; Laporan Bulanan</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/cek_procapaian')?>><i class="fa fa-archive"></i><b>&nbsp; Program Capaian</b></a>
                        </li>
                        <!-- <li>
                            <a href=<?php echo base_url('analis/data_umpanbalik')?>><i class="fa fa-envelope"></i><b>&nbsp; Data Masuk</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_penilaian')?> ><i class="fa fa-star"></i><b>&nbsp; Penilaian</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_kegiatan')?>><i class="fa fa-image"></i><b>&nbsp; Foto Kegiatan</b></a>
                        </li> -->
                        <!-- <li>
                            <a href=<?php echo base_url('analis/data_lokasi')?>><i class="fa fa-home"></i><b>&nbsp; Data Lokasi</b></a>
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
            <div class="report-container">
                    <h3>Daftar File Laporan Keuangan yang Sudah Diupload</h3>
                    <?php if (empty($files)): ?>
                        <p>Tidak ada file yang diupload.</p>
                    <?php else: ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($files as $file): ?>
                                <tr>
                                    <td><?php echo $file; ?></td>
                                    <td><a href="<?php echo base_url('uploads_file/'.$file); ?>" target="_blank">Lihat</a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>

                <div class="buttons">
                    <a href="<?php echo base_url('analis/lapkeuangan') ?>" class="login-btn">Tambah Upload</a>
                </div>
                </center>
                <!-- /.col-lg-12 -->
            </div>
           
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
