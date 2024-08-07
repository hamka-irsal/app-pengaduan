<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Reset Password</title>

  <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?> rel="stylesheet" type="text/css">

</head>

<body style="background-color: #4d4d4d">
  <div class="container">

    <div class="card">
      <div class="card-body">

        <div class="col-md-4 col-md-offset-4">
          <div class="login-panel panel panel-default">

            <center>

              <div class="panel-heading" style="align-items: center;">
                <img src=<?php echo base_url("img\logo.png")?> style="width: auto; height: 100px; margin-bottom: 30px">
                <h3 class="panel-title"><b>RESET PASSWORD</b></h3>
            </div>
        </center>

        <div class="panel-body">
            <form role="form" action=<?php echo base_url("forgot/kirim_reset")?> method="POST">
             <fieldset>

          <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-key"></i>
              </div>
              <input type="hidden" name="id_user" value="<?php echo $id_token[0]->id_user ;?>">
              <input type="hidden" name="token" value="<?php echo $id_token[0]->token ; ?>">
              <input class="form-control" type="password" name="password" placeholder="masukkan password baru">
          </div>
        </div>

  <center>
    <button class="btn btn-sm btn-primary" type="submit">SIMPAN</button>
</center>


</fieldset>
</form>

</div>
</div>
</div>

</div>
</div>
</div>

<!-- jQuery -->
<script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>

<!-- Bootstrap Core JavaScript -->
<script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>

<!-- Metis Menu Plugin JavaScript -->
<script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>

<!-- Custom Theme JavaScript -->
<script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

</body>

</html>
