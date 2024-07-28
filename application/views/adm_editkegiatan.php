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
                            <a href=<?php echo base_url('admin/data_user')?> ><i class="fa fa-user"></i><b>&nbsp; Data Diri</b></a>
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
			
		</ul>
		<!-- /.navbar-top-links -->
		
		<!-- MENU -->
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					
					<li class="sidebar-search" >
						<div class="input-group custom-search-form" >
                                <b>Menu Sistem</b>
                            </div>
						<!-- /input-group -->
					</li>
					
					<!-- menu -->
					<li>
                            <a href=<?php echo base_url('admin')?>><i class="fa fa-home"></i>&nbsp; Dashboard</a>
                    </li>
					<li>
						<a href=<?php echo base_url('admin/data_log')?> ><i class="fa fa-archive"></i>&nbsp; Log Penanganan</a>
					</li>
					<li>
						<a href=<?php echo base_url('admin/data_lokasi')?> ><i class="fa fa-home"></i>&nbsp; Data Lokasi</a>
					</li>
					<li class="active">
						<a href=<?php echo base_url('admin/data_user')?> style="color: #000000" ><i class="fa fa-users"></i><b>&nbsp; Data Pengguna</b></a>
					</li>
					<!-- menu -->
					
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>
	
	<!-- Page Content -->
	<div id="page-wrapper">
		<div class="row">
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
              <div class="panel-heading">
                <center><h3><strong>Edit Kegiatan</strong></h3></center>
              </div>
              <div class="panel-body">
                <!-- Tab Pane Draft -->
              <div class="tab-content"><!-- 
                <div class="active tab-pane fade in" id="halaman_1"> -->
                 <div class="box-body">

                  <form action="<?php echo base_url('admin/edit_kegiatan/' .$kegiatan['id_kegiatan']) ?>" method="POST" role="form" enctype="multipart/form-data">

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Nama Kegiatan:</label>
                    <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" value="<?php echo $kegiatan['nama_kegiatan']; ?>">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Foto Kegiatan:</label>
                    <input type="file" name="foto">
                  </div>
                  
                  <!-- <div class="input-group form-group" style="width: 100%">
                    <div class="input_fields_wrap">
                        <input type="text" name="" placeholder="text" class="form-control" style="width: 40%">
                        <button style="margin-left: 10px" class="add_field_button btn btn-primary">Add</button>
                        <div></div>
                    </div>
                  </div> -->
                  
                  <div style="margin-left: 90%">
                    <button class="btn btn-success" name="submit" value="simpan" type="submit" style="margin-top: 20px; width:80px">simpan</button>
                  </div>
                </div>
                <!-- /.tab-pane -->
              </form>
            </div>
					<!-- /.panel-body -->
				</div>
        <!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		
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
		
	</div>
	<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

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
		$('#dataTables-example1').DataTable({
			responsive: true
		}),
		$('#dataTables-example2').DataTable({
			responsive: true
		}),
		$('#dataTables-example3').DataTable({
			responsive: true
		});
	});

	$("#hilang").show().delay(3000).slideUp(400);
</script>
</body>

</html>
