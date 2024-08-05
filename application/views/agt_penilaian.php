<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.css")?> rel="stylesheet">
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
                            <a href=<?php echo base_url('anggota')?>><i class="fa fa-dashboard"></i><b>&nbsp; Dashboard</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/data_umum')?>><i class="fa fa-users"></i><b>&nbsp; Data Umum</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/data_diri')?> ><i class="fa fa-user"></i><b>&nbsp; Data Diri</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/data_pelapor')?>><i class="fa fa-archive"></i><b>&nbsp; Pelaporan</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/riwayat_pengaduan')?>><i class="fa fa-table"></i><b>&nbsp; Data Masuk</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/data_penilaian')?> ><i class="fa fa-star"></i><b>&nbsp; Penilaian</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/data_umpanbalik')?> ><i class="fa fa-envelope"></i><b>&nbsp; Umpan Balik</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('anggota/data_kegiatan')?>><i class="fa fa-image"></i><b>&nbsp; Foto Kegiatan</b></a>
                        </li>
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
				    <h1 class="page-header">FORM PENILAIAN</h1>
                </center>
                <!-- /.col-lg-12 -->

                <form action="<?php echo base_url('anggota/tambah_penilaian') ?>" method="POST" role="form" enctype="multipart/form-data">

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Silahkan isi email">
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Tgl Penilaian</label>
                      <input type="date" class="form-control" name="tgl_penilaian" id="tgl_penilaian" placeholder="Silahkan isi tgl penilaian">
                    </div>
                    
                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Silahkan isi nama">
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>NIP/NIKH</label>
                      <input type="text" class="form-control" name="nip" id="nip" placeholder="Silahkan isi nip">
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Jabatan</label>
                      <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Silahkan isi jabatan">
                    </div>
                   
                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label for="pendapat1">Bagimana pendapat anda terhadap kemudahan pelaporan kerusakan di unit ini?</label><br>
                        <input type="radio" name="pendapat1" value="Sangat Memuaskan"> Sangat Memuaskan<br>
                        <input type="radio" name="pendapat1" value="Memuaskan"> Memuaskan<br>
                        <input type="radio" name="pendapat1" value="Kurang Memuaskan"> Kurang Memuaskan<br>
                        <input type="radio" name="pendapat1" value="Tidak Memuaskan"> Tidak Memuaskan<br>
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label for="pendapat2">Bagaimana pendapat anda tentang kecepatan waktu dalam memberikan pelayanan perbaikan kerusakan alat maupun perangkat?</label><br>
                        <input type="radio" name="pendapat2" value="Sangat Memuaskan"> Sangat Memuaskan<br>
                        <input type="radio" name="pendapat2" value="Memuaskan"> Memuaskan<br>
                        <input type="radio" name="pendapat2" value="Kurang Memuaskan"> Kurang Memuaskan<br>
                        <input type="radio" name="pendapat2" value="Tidak Memuaskan"> Tidak Memuaskan<br>
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label for="pendapat3">Bagaimana pendapat anda tentang kompetensi kemampuan petugas dalam pelayanan</label><br>
                        <input type="radio" name="pendapat3" value="Sangat Memuaskan"> Sangat Memuaskan<br>
                        <input type="radio" name="pendapat3" value="Memuaskan"> Memuaskan<br>
                        <input type="radio" name="pendapat3" value="Kurang Memuaskan"> Kurang Memuaskan<br>
                        <input type="radio" name="pendapat3" value="Tidak Memuaskan"> Tidak Memuaskan<br>
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label for="pendapat4">Bagaimana pendapat anda perilaku petugas dalam pelayanan terkait kesopanan dan keramahan</label><br>
                        <input type="radio" name="pendapat4" value="Sangat Memuaskan"> Sangat Memuaskan<br>
                        <input type="radio" name="pendapat4" value="Memuaskan"> Memuaskan<br>
                        <input type="radio" name="pendapat4" value="Kurang Memuaskan"> Kurang Memuaskan<br>
                        <input type="radio" name="pendapat4" value="Tidak Memuaskan"> Tidak Memuaskan<br>
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label for="pendapat5">Bagaimana pendapat anda tentang kualitas sarana dan prasarana kampus</label><br>
                        <input type="radio" name="pendapat5" value="Sangat Memuaskan"> Sangat Memuaskan<br>
                        <input type="radio" name="pendapat5" value="Memuaskan"> Memuaskan<br>
                        <input type="radio" name="pendapat5" value="Kurang Memuaskan"> Kurang Memuaskan<br>
                        <input type="radio" name="pendapat5" value="Tidak Memuaskan"> Tidak Memuaskan<br>
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Saran/masukan untuk pelayanan kedepannya</label><br>
                      <textarea name="saran"></textarea>
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
            <!-- /.row -->

            
            
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

                    <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js")?> ></script>
                    <script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js")?> ></script>
                    <script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

                    <script type="text/javascript">
                        $(function () {
                            $('#example1').DataTable()
                            $('#example2').DataTable({
                              'paging'      : true,
                              'lengthChange': false,
                              'ordering'    : false,
                              'info'        : true,
                              'autoWidth'   : false
                          })
                        })
                    </script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tempat').change(function(){
      var id=$(this).val();
      $.ajax({
                    url : "<?php echo base_url('user/Cform/ruang');?>", //ngarahin ke function ruang di cform
                    method : "POST",
                    data : {id:id},
                    dataType : 'json',
                    success : function(data){
                      var html = '';
                      var i;

                      html += '<option value="">pilih ruang kejadian</option>';

                      if(data.length == 0)
                      {
                        html += '<option value = ""> Maaf, data tidak ditemukan!</option>';
                      }
                      else
                      {
                        for(i=0; i<data.length; i++)
                        {   //jika ada, maka akan tampilkan data dari tabel ruang
                          html += '<option value = "'+ data[i].id_ruang +'">' + data[i].nama_ruang +'</option>';
                        }
                      }
                      $('.ruang').html(html);
                    }
                  });
    });
  });
</script>

<script type="text/javascript">
  $("#hilang").show().delay(1500).slideUp(400);
</script>
        </html>
