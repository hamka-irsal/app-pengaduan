<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login App-Pengaduan</title>

	<link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
	<link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?> rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >
    

</head>

<!--<body style="background-image: url('<?php //echo base_url("img/dn.jpg")?>'); width: auto; height: 100%" > -->
  <body style="background-image: url('<?php echo base_url("img/profil.jpg")?>'); background-size: 1370px 750px;">
    <div class="container">

      <div class="card">
        <div class="card-body">

          <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">

              <center>
                
                  <?php

                  if($this->session->flashdata('message')): ?>
                    <div class="alert alert-<?php echo $this->session->flashdata('style'); ?> alert-dismissable fade-in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp;<br>
                        <?php echo $this->session->flashdata('message'); ?>
                  </div>
                <?php endif; ?>

                <div class="panel-heading" style="align-items: center; margin-top: none">
                  <img src=<?php echo base_url("img/logo.png")?> style="width: auto; height: 100px; margin-bottom: 30px">
                  <h3 class="panel-title"><b>SISTEM PENGADUAN KERUSAKAN KAMPUS</b></h3>
                  <h5>Politeknik Negri Ujung Pandang</h5>
                </div>
              </center>

              <div class="panel-body">
                <form role="form" action=<?php echo base_url("Login_pengadu/loginMe")?> method="POST">
                  <fieldset>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                        <input type="text" name="username" class="form-control"  placeholder="NIP/NIM" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-key"></i>
                        </div>
                        <input class="form-control" placeholder="Password" name="password" type="password" required>
                      </div>
                    </div>
                    <div class="checkbox">
                      <center>
                        <button class="btn btn-sm btn-primary" type="submit">MASUK</button>
                      </center>
                    </div>
                    <div>
                      <center>
                      <a href=<?php echo base_url('user/register')?> class="btn btn-primary btn-md"><span class="fa fa-user-plus"></span> Registrasi Pengguna </a>
                      </center>
                    </div>
                  </fieldset>
                </form>
                <center style="margin-top: 10px">
                  <h6>Jika anda lupa password hubungi Admin!</h6>
                </center>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


	<div class="modal modal-primary fade" id="tambahPengguna" style="margin-top: 5%">
			<div class="modal-dialog">
				<div class="modal-content" style="width: 80%; margin-left: 10%">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<center>
						<h4 class="modal-title">REGISTER PENGGUNA BARU</h4>
						</center>
					</div>
					
					<form method="POST" action="<?php echo base_url('register_user') ?>">
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
