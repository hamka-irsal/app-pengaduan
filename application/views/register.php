<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Form Pengaduan Pengguna</title>

  <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?> rel="stylesheet" type="text/css">

</head>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #204060">
      <div class="container">

       
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">

          <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
      </nav>

      <!-- Page Content -->
      <div class="container">
        <!-- <h2 class="page-header"><img src="<?php //echo base_url('img/ugm.gif') ?>" style="width: auto; height: 60px; margin-right: 10px"> SISTEM INFORMASI PENGADUAN</h2> -->
        <div class="row">
          <div class="col-lg-12">

            <center>
              <?php if($this->session->flashdata('message')): ?>
                <div style="margin-top: 10px; width: 50%" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
                  <?php echo $this->session->flashdata('message') ?>
                </div>
              <?php endif; ?>
            </center>

            <div class="panel panel-default">
              <div class="panel-heading">
                <center><h3><strong>FORM REGISTER</strong></h3></center>
              </div>
              <div class="panel-body">
                <!-- Tab Pane Draft -->
              <div class="tab-content"><!-- 
                <div class="active tab-pane fade in" id="halaman_1"> -->
                 <div class="box-body">

                  <form action="<?php echo base_url('user/register') ?>" method="POST" role="form" enctype="multipart/form-data">

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama_pengguna" id="nama_pengguna" placeholder="Silahkan isi nama">
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>NIP/NIM/Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Silahkan isi username">
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Silahkan isi email">
                    </div>
                   
                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Silahkan isi password">
                    </div>

                    <!-- ruang dan tempat -->
                    <div class="form-group" style="width: 100%; margin-bottom: 10px">
                      <div class="col-md-6">
                        <label><b>Role</b></b></label>
                        <select  class="form-control" name="role"  id="role" required>
                          <option value="">pilih role</option>
                          <?php foreach($roles as $role): ?>
                            <option value="<?php echo $role->id_role; ?>"><?php echo $role->role; ?></option>
                         <?php endforeach; ?>
                        </select> 
                      </div>
                    </div>

                    <div class="form-group" style="width: 100%; margin-bottom: 10px">
                      <div class="col-md-6">
                        <label><b>Level</b></b></label>
                        <select  class="form-control" name="level"  id="level" required>
                          <option value="">pilih level</option>
                          <?php foreach($levels as $level): ?>
                            <option value="<?php echo $level->id_level; ?>"><?php echo $level->nama_level; ?></option>
                         <?php endforeach; ?>
                        </select> 
                      </div>
                    </div>

                  </div>
                  
                  <!-- <div class="input-group form-group" style="width: 100%">
                    <div class="input_fields_wrap">
                        <input type="text" name="" placeholder="text" class="form-control" style="width: 40%">
                        <button style="margin-left: 10px" class="add_field_button btn btn-primary">Add</button>
                        <div></div>
                    </div>
                  </div> -->
                  
                  <div style="margin-left: 90%">
                    <button class="btn btn-success" name="simpan" value="simpan" style="margin-top: 20px; width:80px">simpan</button>
                  </div>
                </div>
                <!-- /.tab-pane -->
              </form>
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
      </div>

    </div>

  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>

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
        
        <form method="POST" action="<?php echo base_url('user/ubah_password') ?>">
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

  <footer class="footer">
    <div class="container">
      <strong>Copyright &copy; 2024</strong>
    </div>
  </footer>

</div>

<!-- /#wrapper -->

<!-- jQuery -->
<script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>

<!-- Bootstrap Core JavaScript -->
<script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>

<!-- Metis Menu Plugin JavaScript -->
<script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>

<!-- Custom Theme JavaScript -->
<script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>



<!-- <script type="text/javascript">
    $(document).ready(function() {
    var max_fields      = 3; //maximum input
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box
            x++; //text box increment
            $(wrapper).append('<div class="input-group form-group" style="margin-top:10px; width:100%"><input class="form-control" style="width:40%" type="text" placeholder="text" name="mytext[]"/><a href="#" style="margin-left:10px" class="remove_field btn btn-danger">remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x min min;
    })
});
</script> -->

</body>

</html>
