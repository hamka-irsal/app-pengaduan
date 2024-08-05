<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail Pengaduan</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">

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
                    <h1 class="page-header">Detail Pengaduan Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div>
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalKonfirmasi"><span class="fa fa-check"></span> Selesai </a>

                                <a style="margin-left: 20px" href="#" class="btn btn-warning btn-md" data-toggle="modal" data-target="#modalKirim"><span class="fa fa-send"></span> Proses Pengaduan</a>
                            </div>

                        </div>
                        <div class="panel-body">
                            <table class="table no border" cellpadding="0" cellspacing="0"" >
                                <?php
                                foreach ($detail_pengaduan as $data) 
                                {
                                    ?>
                                    <tr>
                                        <td><b>Gambar Pendukung:</b></td>
                                        <td>:</td>
                                        <td style="width: 80%"><img src="<?php echo base_url('assets/gambar/'.$data->gambar) ?>" style="width: 20%; height: auto"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tanggal Kejadian</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->tgl_kejadian ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Pengadu</b></td>
                                        <td>:</td>
                                        <td>
											<?php 
												echo $data->nama_pengguna; 
											?>
										</td>
                                    </tr>
                                    <tr>
                                        <td><b>Ruang</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->nama_ruang ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah kejadian</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->kejadian ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Penyebab</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->penyebab ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Efek kejadian</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->efek ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Deskripsi</b></td>
                                        <td>:</td>
                                        <td style="width: 80%"><?php echo $data->deskripsi ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tindakan Pelapor</b></td>
                                        <td>:</td>
                                        <td style="width: 80%"><?php echo $data->tindaklanjut ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kategori</b></td>
                                        <td>:</td>
                                        <td><?php echo $data->kategori ?>
                                            <span></span>
                                        </td>
                                    </tr>

                                    <!-- modal konfirm -->
                                    <div class="modal modal-primary fade" id="modalKonfirmasi" style="margin-top: 5%;">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                    <center>
                                                        <h4 class="modal-title">Anda yakin akan konfirmasi pengaduan?</h4>
                                                    </center>
                                                </div>
                                                
                                                <form method="POST" action="<?php echo base_url('admin/konfirmasi') ?>">
                                                      <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div >
                                                                    <label>Silahkan berikan laporan terlebih dahulu :</label>
                                                                    <textarea class="form-control" type="text" name="keterangan" required></textarea>
                                                                    <input type="hidden" name="id_pengaduan" value="<?php echo $data->id_pengaduan ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                        <!-- <a style="margin-left: 40px;" href="<?php echo base_url('koordinator/konfirmasi/'.$detail_pengaduan[0]->id_pengaduan); ?>" class="btn btn-success btn-md">&nbsp;&nbsp;&nbsp;YA&nbsp;&nbsp;&nbsp;</a> -->
 -->
                                                        <input type="submit" class="btn btn-primary" value="Selesai">
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal setting -->

                                    <!-- modal kirim -->
                                    <div class="modal modal-primary fade" id="modalKirim" style="margin-top: 5%">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                              <center>
                                                <h4 class="modal-title">KIRIM PROSES PENGADUAN</h4>
                                              </center>
                                          </div>

                                          <form method="POST" action="<?php echo base_url('admin/kirim_pengaduan') ?>">
                                              <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div >
                                                            <label>Laporan :</label>
                                                            <textarea class="form-control" type="text" name="keterangan"></textarea>
                                                            <input type="hidden" name="id_pengaduan" value="<?php echo $data->id_pengaduan ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                <input type="submit" class="btn btn-primary" value="kirim">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                                <?php
                            }
                            ?>
                        </table>

            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</div>

<!-- /#wrapper -->


<script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js")?> ></script>
<script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>
<script src=<?php echo base_url("assets/dist/jquery.min.js")?> ></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

<script type="text/javascript">
        $(document).ready(function(){ //Make script DOM ready
        $('#myselect').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="secondoption"){ //Compare it and if true
            $('#myModal').modal("show"); //Open Modal
        }
    });
    });
</script>

<script type="text/javascript">
    $(function(){

$.ajaxSetup({
type:"post",
cache:false,
dataType: "json"
});


$(document).on("click","td",function(){
$(this).find("span[class~='caption']").hide();
$(this).find("input[class~='editor']").fadeIn().focus();
});
});
</script>

<script>
$(function(){

  $('img').mouseenter(function(){
  $('img').css('width','70%');
 });
 $('img').mouseleave(function(){
  $('img').css('width','150');
});});
</script>

</body>

</html>
