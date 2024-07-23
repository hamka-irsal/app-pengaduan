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
	
	<!-- Page Content -->
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<center>
	          <?php if($this->session->flashdata('message')): ?>
	              <div style="margin-top: 10px;" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
	                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                  <strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
	                  <?php echo $this->session->flashdata('message') ?>
	            </div>
	          <?php endif; ?>
	        </center>
				<center>
				<h1 class="page-header">Data Kegiatan</h1>
				</center>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">

						<a  href=<?php echo base_url('admin/tambah_kegiatan')?> class="btn btn-primary btn-md" style="margin-left: 74%"><span class="fa fa-plus"></span> Tambah Kegiatan </a>
						
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div id="mahasiswa" class="tab-pane fade in active">
								<!-- data mahasiswa -->
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
									<thead>
										<tr>
											<th>No</th>
											<th style="width: 35%">Nama Kegiatan</th>
											<th>Foto Kegiatan</th>
											<th style="width: 40px;">aksi</th>
										</tr>
									</thead>
									<tbody>
                                        <?php $i=1; ?>
                                        <?php foreach ($kegiatan as $k) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $k['nama_kegiatan']; ?></td>
                                            <td><img src="<?php echo base_url('assets/gambar/'.$k['foto']); ?>" width="100"></td>
                                            <td>
                                                <a class="fa fa-edit" href="<?php echo site_url('admin/edit_kegiatan/'.$k['id_kegiatan']); ?>"></a>
                                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');" href="<?php echo base_url('admin/hapus_kegiatan/'.$k['id_kegiatan']); ?>"><i class="fa fa-trash-o" style="color: red"></i>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
									</tbody>
								</table>
                            </div>
							
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
