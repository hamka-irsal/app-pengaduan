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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
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
                    <h1 class="page-header">Detail Pengaduan Pengguna</h1>
                </div>
                </center>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          
            <div class="row">
                <div class="col-lg-12">
                <table>
        <thead>
            <tr>
                <th style="text-align: center;"><h5><b>POLITEKNIK <br> NEGERI <br> UJUNG PANDANG</b></h5></th>
                <th style="text-align: center;"><h5><b>LAPORAN KERUSAKAN <br> UPT. TEKNOLOGI PERMESINAN DAN <br> PERALATAN PENUNJANG AKADEMIK</b></h5></th>
                <th style="text-align: center;">NO LAPORAN : <?= $pengaduan['id_pengaduan']; ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>NAMA ALAT/MESIN :</td>
                <td><?= $pengaduan['alat']; ?></td>
                <td>NO INVENT : <?= $pengaduan['inventaris']; ?></td>
            </tr>
            <tr>
                <td>SPESIFIKASI :</td>
                <td><?= $pengaduan['spesifikasi']; ?></td>
                <td>TANGGAL : <?= $pengaduan['tgl_kejadian']; ?></td>
            </tr>
            <tr>
                <td>KEJADIAN :</td>
                <td><?= $pengaduan['kejadian']; ?></td>
                <td>JURUSAN/UNIT : <?= $pengaduan['jurusan']; ?></td>
            </tr>
            <tr>
                <td>KERUSAKAN :</td>
                <td><?= $pengaduan['penyebab']; ?></td>
                <td>PROGRAM STUDI : <?= $pengaduan['studi']; ?></td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th style="text-align: center;"><h5><b>DILAPORKAN OLEH</b></h5></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>NAMA :  <?= $pengaduan['nama']; ?></td>
            </tr>
            <tr>
                <td>NIP/NIKH :  <?= $pengaduan['nip']; ?></td>
            </tr>
            <tr>
                <td>TANDA TANGAN : </td>
            </tr>
            <tr>
                <td>CATATAN TAMBAHAN : </td>
            </tr>
            <tr>
                <td>DOKUMENTASI ALAT :<img src="<?= base_url('assets/gambar/'.$pengaduan['gambar']); ?>" alt="Gambar Pengaduan" style="width: 100px; height: 100px;"></td>
            </tr>
        </tbody>
    </table>
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
