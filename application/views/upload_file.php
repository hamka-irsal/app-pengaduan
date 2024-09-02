<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Visi Misi</title>

  <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?> rel="stylesheet" type="text/css">
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #343a40;
        }
        
        .header {
            background-color: #007bff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            color: #ffffff;
            margin: 0;
        }

        .navbar {
            display: flex;
            justify-content: center;
            background-color: #343a40;
            padding: 10px;
        }

        .navbar a {
            color: #ffffff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .content {
            padding: 40px 20px;
        }

        .content img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
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
    </style>
    
</head>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <div class="navbar">
        <a href="<?php echo base_url('Home/index') ?>">Beranda</a>
        <a href="<?php echo base_url('Visimisi/index') ?>">Visi & Misi</a>
        <a href="<?php echo base_url('Foto_kegiatan') ?>">Foto Kegiatan</a>
        <a href="<?php echo base_url('Cek_laporan') ?>">Cek Laporan</a>
        <a href="<?php echo base_url('Uploadfile') ?>">Laporan TP3A</a>
    </div>

      <!-- Page Content -->
      <div class="container">
        <!-- <h2 class="page-header"><img src="<?php //echo base_url('img/ugm.gif') ?>" style="width: auto; height: 60px; margin-right: 10px"> SISTEM INFORMASI PENGADUAN</h2> -->
        <div class="row">
          <div class="col-lg-12">

                <center>
                <div class="upload-container">
                    <h3>Upload File</h3>
                    <?php echo form_open_multipart('upload/do_upload'); ?>
                    
                    <label for="file-upload">Choose File</label>
                    <input type="file" name="userfile" id="file-upload" size="20" onchange="displayFileName(this)" />
                    <p class="file-name" id="file-name">No file chosen...</p>

                    <input type="submit" value="Upload" />
                    
                    </form>
                </div>

                <script>
                    function displayFileName(input) {
                        var fileName = input.files[0].name;
                        document.getElementById('file-name').textContent = fileName;
                    }
                </script>
                </center>

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
