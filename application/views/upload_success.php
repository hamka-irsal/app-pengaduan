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
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
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
            color: #4CAF50;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
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
                <h3>File Berhasil Diupload!</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($upload_data as $item => $value): ?>
                        <tr>
                            <td><?php echo ucfirst(str_replace('_', ' ', $item)); ?></td>
                            <td><?php echo $value; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <p><a href="<?php echo site_url('upload'); ?>">Upload File Lain</a></p>
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
