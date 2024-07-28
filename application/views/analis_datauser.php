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
                            <a href=<?php echo base_url('analis')?>><i class="fa fa-dashboard"></i><b>&nbsp; Dashboard</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_umum')?>><i class="fa fa-users"></i><b>&nbsp; Data Umum</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_diri')?> ><i class="fa fa-user"></i><b>&nbsp; Data Diri</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_pelapor')?>><i class="fa fa-archive"></i><b>&nbsp; Pelaporan</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_masuk')?>><i class="fa fa-folder"></i><b>&nbsp; Data Masuk</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_penilaian')?> ><i class="fa fa-star"></i><b>&nbsp; Penilaian</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_umpanbalik')?>><i class="fa fa-envelope"></i><b>&nbsp; Umpan Balik</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_lokasi')?>><i class="fa fa-folder"></i><b>&nbsp; Data Lokasi</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_kegiatan')?>><i class="fa fa-image"></i><b>&nbsp; Foto Kegiatan</b></a>
                        </li>
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
				<h1 class="page-header">Data Diri</h1>
				</center>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						
						<a href="#" class="btn btn-success btn-md" data-toggle="modal" data-target="#modalUpload"><span class="fa fa-upload"></span> Unggah </a>

						<a href="#" class="btn btn-primary btn-md" style="margin-left: 74%" data-toggle="modal" data-target="#tambahPengguna"><span class="fa fa-user-plus"></span> Tambah Pengguna </a>
						
					</div>
					<div class="panel-body">
						
						<ul class="nav nav-tabs" style="margin-bottom: 20px">
							<li class="active"><a data-toggle="tab" href="#mahasiswa">mahasiswa</a></li>
							<li><a data-toggle="tab" href="#staf" >Pegawai</a></li>
						</ul>
						
						
						<div class="tab-content">
							<div id="mahasiswa" class="tab-pane fade in active">
								<!-- data mahasiswa -->
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
									<thead>
										<tr>
											<th>No</th>
											<th style="width: 35%">Nama Pengguna</th>
											<th>Email</th>
											<th>NIM</th>
											<th>Role</th>
											<th>Status</th>
											<th style="width: 40px;">aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											foreach ($user as $data)
											{
												if($data->id_role == 1) {
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $data->nama_pengguna ?></td>
													<td><?php echo $data->email ?></td>
													<td><?php echo $data->username ?></td>
													<td><?php echo $data->role ?></td>
													<td>
														<?php
															$i++;
															if($data->status == 1)
															{
																echo "<span class='badge success'>aktif</span>";
															}
															else
															{
																echo "<span class='badge danger'>tidak aktif</span>";
															} 
														?></td>
														<td>
															<a class="fa fa-edit" style="color: blue" data-toggle="modal" data-target="#editUser<?php echo $data->id_user; ?>"></a>&nbsp;

															<a onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');" href="<?php echo base_url('admin/hapus_user/'.$data->id_user) ?>"><i class="fa fa-trash-o" style="color: red"></i>
															</a>
														</td>
												</tr>
												
												<!-- modal edit user -->
												<div class="modal modal-primary fade" id="editUser<?php echo $data->id_user; ?>" style="margin-top: 5%">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title">EDIT DATA USER</h4>
															</div>
															
															<form method="POST" action="<?php echo base_url('admin/edit_user') ?>">
																<div class="modal-body">
																	<div class="row">
																		<div class="col-md-12">
																			
																			<div class="form-group">
																				<label>Nama Pengguna :</label>
																				<input class="form-control" type="text" name="nama" value="<?php echo $data->nama_pengguna ?>">
																				<input class="form-control" type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
																			</div>
																			
																			<div class="form-group">
																				<label>Email :</label>
																				<input class="form-control" type="text" name="email" value="<?php echo $data->email ?>">
																			</div>

																			<div class="form-group">
																				<label>NIM :</label>
																				<input class="form-control" type="text" name="username" value="<?php echo $data->username ?>">
																			</div>

																			<div class="form-group">
																				<label>Ubah Password :</label>
																				<input class="form-control" type="password" name="password">
																			</div>

																			<div class="form-group" style="width: 30%;">
                                                                            <label>Level :</label>
	                                                                            <input type="text" class="form-control" value="<?php echo $data->nama_level.' '.$data->posisi ?>" readonly>
	                                                                            <input type="hidden" class="form-control" name="id_level" value="<?php echo $data->id_level ?>">
																			</div>

																			<div class="form-group" style="width:30%;">
																				<label>Status :</label>
																				<select name="status" class="form-control" style="margin-bottom: 20px">
																				<option <?php if($data->status == 1){echo "selected";} ?> value="1" >Aktif</option>
																				<option <?php if($data->status == 0){echo "selected";} ?> value="0">Tidak Aktif</option>
																			</select>
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
												<!-- modal edit user -->
												
												<?php
												}
											} 
										?>
									</tbody>
								</table>
							</div>
							
							<div id="staf" class="tab-pane fade">
								<!-- data staf -->
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th style="width: 35%">Nama Pengguna</th>
                                            <th>Email</th>
                                            <th>NIP</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th style="width: 50px;">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach ($user as $data)
                                            {
                                                if($data->id_role == 3) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $data->nama_pengguna ?></td>
                                                    <td><?php echo $data->email ?></td>
                                                    <td><?php echo $data->username ?></td>
                                                    <td><?php echo $data->role ?></td>
                                                    <td>
                                                        <?php
                                                            $i++;
                                                            if($data->status == 1)
                                                            {
                                                                echo "<span class='badge success'>aktif</span>";
                                                            }
                                                            else
                                                            {
                                                                echo "<span class='badge danger'>tidak aktif</span>";
                                                            } 
                                                        ?></td>
                                                        <td>
                                                            <span><i class="fa fa-edit" style="color: blue" data-toggle="modal" data-target="#editUser<?php echo $data->id_user; ?>"></i></span>&nbsp;
                                                            
                                                            <a onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');" href="<?php echo base_url('admin/hapus_user/'.$data->id_user) ?>"><i class="fa fa-trash-o" style="color: red"></i>
															</a>
                                                        </td>
                                                </tr>
                                                
                                                <!-- modal edit user -->
                                                <div class="modal modal-primary fade" id="editUser<?php echo $data->id_user; ?>" style="margin-top: 5%">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">EDIT DATA USER</h4>
                                                            </div>
                                                            
                                                            <form method="POST" action="<?php echo base_url('admin/edit_user') ?>">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            
                                                                            <div class="form-group">
                                                                                <label>Nama Pengguna :</label>
                                                                                <input class="form-control" type="text" name="nama" value="<?php echo $data->nama_pengguna ?>">
                                                                                <input class="form-control" type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <label>Email :</label>
                                                                                <input class="form-control" type="text" name="email" value="<?php echo $data->email ?>">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>NIP :</label>
                                                                                <input class="form-control" type="text" name="username" value="<?php echo $data->username ?>">
                                                                            </div>

                                                                            <div class="form-group" style="width: 30%;">
                                                                            <label>Level :</label>
																				<select name="id_level" class="form-control">
																					<?php
																					foreach($level as $l){ ?>
																					<option <?php echo ($data->id_level == $l->id_level ? 'selected' : ''); ?> value="<?php echo $l->id_level ?>"><?php echo $l->nama_level." ".$l->posisi ?></option>
																					<?php } ?>
																				</select>
																			</div>

                                                                            <div class="form-group" style="width:30%;">
																				<label>Status :</label>
																				<select name="status" class="form-control" style="margin-bottom: 20px">
																				<option <?php if($data->status == 1){echo "selected";} ?> value="1" >Aktif</option>
																				<option <?php if($data->status == 0){echo "selected";} ?> value="0">Tidak Aktif</option>
																			</select>
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
                                                    </div>
                                                </div>
                                                <!-- modal edit user -->
                                                
                                                <?php
                                                }
                                            } 
                                        ?>
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
		
		<!-- modal upload -->
		<div class="modal modal-primary fade" id="modalUpload" style="margin-top: 5%">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">UPLOAD DATA PENGGUNA</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								
                <div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<b>Perhatian!</b> Jika Anda ingin mengunggah data excel, pastikan data Anda sudah sesuai dengan syarat upload di bawah:
				</div>
                1. Data yang dapat diunggah dalam format <b>xls, xlsx, dan csv</b>.<br>
                2. Pastikan <b>tidak ada</b> data yang <b>terlewat</b> atau <b>kosong!</b><br>
                3. Ukuran file maksimum 10 mb.<br>
                4. Untuk menghindari kegagalan, Anda dapat mengunduh contoh format file di bawah:<br>
                <a href="<?php echo base_url('admin/download') ?>" class="btn btn-sm btn-success" style="margin-top: 10px"><i class="fa fa-download"></i> Unduh</a><br><br>
                5. Jika telah memenuhi syarat, silahkan unggah data Anda.
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<form action="<?php echo base_url()?>admin/data_user/upload" method="POST" enctype="multipart/form-data">
							<input type="file" name="file" required>
							<input type="submit" value="unggah" class="btn btn-primary">
						</form>
					</div>
					
				</div>
			</div>
		</div>
		<!-- modal setting -->

		<!-- modal setting -->
		<div class="modal modal-primary fade" id="tambahPengguna" style="margin-top: 5%">
			<div class="modal-dialog">
				<div class="modal-content" style="width: 80%; margin-left: 10%">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<center>
						<h4 class="modal-title">TAMBAH PENGGUNA BARU</h4>
						</center>
					</div>
					
					<form method="POST" action="<?php echo base_url('admin/tambah_user') ?>">
						<div class="modal-body">
							<div class="row">
                				<div class="col-md-12">

									<div class="form-group row">
									    <label class="col-sm-2 col-form-label">Nama</label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control" name="nama_pengguna" placeholder="Silahkan isi nama lengkap" required>
									    </div>
									</div>

									<div class="form-group row">
									    <label class="col-sm-2 col-form-label">NIP</label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control" name="username" placeholder="Silahkan isi nip" required>
									    </div>
									</div>

									<div class="form-group row">
									    <label class="col-sm-2 col-form-label">Email</label>
									    <div class="col-sm-10">
									      <input type="email" class="form-control" name="email" placeholder="Silahkan isi email" required>
									    </div>
									</div>

									<div class="form-group row">
									    <label class="col-sm-2 col-form-label">Password</label>
									    <div class="col-sm-10">
									      <input type="password" class="form-control" name="password" required>
									    </div>
									</div>

									<div class="form-group row">
									    <label class="col-sm-2 col-form-label">Role</label>
									    <div class="col-sm-10">
									    	<select class="form-control" name="id_role" style="width: 50%" required>
									    		<option value="">Pilih Role</option>
									    		<?php
									    			foreach ($role as $data)
									    			{
									    				if($data->role){
									      		?>
									      		<option value="<?php echo $data->id_role ?>"><?php echo $data->role ?></option>
									      		<?php
										      	}}
										      	?>
									    	</select>
									    </div>
									</div>

									<div class="form-group row">
									    <label class="col-sm-2 col-form-label">Level</label>
									    <div class="col-sm-10">
									    	<select class="form-control" name="id_level" style="width: 50%" required>
									    		<option value="">Pilih Level</option>
									    		<?php
									    			foreach ($level as $data)
									    			{
									      		?>
									      		<option value="<?php echo $data->id_level ?>"><?php echo $data->nama_level." ".$data->posisi ?></option>
									      		<?php
										      	}
										      	?>
									    	</select>
									    </div>
									</div>

								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
							<input type="submit" class="btn btn-success" value="Tambah">
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
