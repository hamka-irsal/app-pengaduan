<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >

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
                <div class="col-lg-12">

                    <?php if($this->session->flashdata('ruang_msg')): ?>
                      <div style="margin-top: 10px; width: 50%" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
                          <?php echo $this->session->flashdata('ruang_msg') ?>
                    </div>
                  <?php elseif($this->session->flashdata('tempat_msg')): ?>
                      <div style="margin-top: 10px; width: 50%" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
                          <?php echo $this->session->flashdata('tempat_msg') ?>
                    </div>
                  <?php endif; ?>
                    <center>
                    <h1 class="page-header">Data Ruang dan Tempat</h1>
                    </center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row data ruang -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>RUANG</strong>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ruang" style="margin-left: 72%"><i class="fa fa-plus"></i> tambah</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- search -->
                            <div class="form-group" style="margin-bottom: 10px; width: 50%">
                              <div class="input-group">
                                
                              </div>
                            </div>
                            <!-- end search -->

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover"" id="example2">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px">No</th>
                                            <th>Nama Ruang</th>
                                            <th style="width: 50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($ruang as $data) 
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data->nama_ruang ?></td>
                                                <td>
                                                    <span><i class="fa fa-edit" style="color: blue" data-toggle="modal" data-target="#editRuang<?php echo $data->id_ruang; ?>"></i></span>&nbsp;
                                                    
                                                    <a href="<?php echo base_url('admin/hapus_ruang/'.$data->id_ruang) ?>"><i class="fa fa-trash-o" style="color: red"></i></a>
                                                </td>
                                            </tr>

                                            <!-- modal edit -->
                                            <div>
                                                <div class="modal modal-primary fade" id="editRuang<?php echo $data->id_ruang; ?>" style="margin-top: 5%">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title">EDIT RUANG</h4>
                                                      </div>

                                                      <form method="POST" action="<?php echo base_url('admin/edit_ruang') ?>">
                                                          <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group">
                                                                        <label>Edit ruang</label>
                                                                        <input class="form-control" type="text" name="nama_ruang" value="<?php echo $data->nama_ruang ?>">
                                                                        <input class="form-control" type="hidden" name="id_ruang" value="<?php echo $data->id_ruang ?>">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                                                            <input type="submit" class="btn btn-primary" value="simpan">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>

                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>TEMPAT</strong>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#tempat" style="margin-left: 71%"><i class="fa fa-plus"></i> tambah</button>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- search -->
                            <div class="form-group" style="margin-bottom: 10px; width: 50%">
                            </div>
                            <!-- end search -->
                        <div class="table-responsive" id="navbar">
                            <table class="table table-bordered table-hover"" id="example1">
                                <thead>
                                    <tr>
                                        <th style="width: 40px">No</th>
                                        <th>Nama Tempat</th>
                                        <th style="width: 50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($tempat as $data) 
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $x; ?></td>
                                            <td><?php echo $data->nama_tempat ?></td>
                                            <td>
                                                <span><i class="fa fa-edit" style="color: blue" data-toggle="modal" data-target="#editTempat<?php echo $data->id_tempat; ?>"></i></span>&nbsp;
                                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus data tempat ini?');" href="<?php echo base_url('admin/hapus_tempat/'.$data->id_tempat) ?>"><i class="fa fa-trash-o" style="color: red"></i></a>
                                            </td>
                                        </tr>

                                        <!-- modal edit tempat -->
                                            <div>
                                                <div class="modal modal-primary fade" id="editTempat<?php echo $data->id_tempat; ?>" style="margin-top: 5%">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title">EDIT TEMPAT</h4>
                                                      </div>

                                                      <form method="POST" action="<?php echo base_url('admin/edit_tempat') ?>">
                                                          <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group">
                                                                        <label>Edit Tempat</label>
                                                                        <input class="form-control" type="text" name="nama_tempat" value="<?php echo $data->nama_tempat ?>">
                                                                        <input class="form-control" type="hidden" name="id_tempat" value="<?php echo $data->id_tempat ?>">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                                                            <input type="submit" class="btn btn-primary" value="simpan">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                        <?php
                                        $x++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
    </div>
    <!-- /#page-wrapper -->

    <!-- modal tambah ruang -->
    <div>
        <div class="modal modal-primary fade" id="ruang" style="margin-top: 5%">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">TAMBAH RUANG</h4>
              </div>

              <form method="POST" action="<?php echo base_url('admin/tambah_ruang') ?>">
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label>Tambah ruang</label>
                                <input class="form-control" type="text" name="nama_ruang" required>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="simpan">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- modal tambah ruang -->
<div>
    <div class="modal modal-primary fade" id="tempat" style="margin-top: 5%">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">TAMBAH TEMPAT</h4>
          </div>

          <form method="POST" action="<?php echo base_url('admin/tambah_tempat') ?>">
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Tambah tempat</label>
                            <input class="form-control" type="text" name="nama_tempat" autofocus required>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="simpan">
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
</div>






</div>
<!-- /#wrapper -->

<!-- modal setting -->
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

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

<script type="text/javascript">
    $("#hilang").show().delay(2000).slideUp(400);
</script>

<script type="text/javascript">
    $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
    $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>

</html>
