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
                            <a href=<?php echo base_url('analis/riwayat_pengaduan')?>><i class="fa fa-folder"></i><b>&nbsp; Data Masuk</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_penilaian')?> ><i class="fa fa-star"></i><b>&nbsp; Penilaian</b></a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('analis/data_umpanbalik')?>><i class="fa fa-envelope"></i><b>&nbsp; Umpan Balik</b></a>
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
                <center>
				    <h1 class="page-header">FORM PENGADUAN</h1>
                </center>
                <!-- /.col-lg-12 -->

                <form action="<?php echo base_url('analis/insert_data') ?>" method="POST" role="form" enctype="multipart/form-data">

                    <div class="form-group" style="margin-left: 15px">
                      <label>Silahkan isikan tanggal kejadian (Anda dapat mengubahnya) <b style="color: red">*</b></label>
                      <div class="input-group col-sm-6" style="width: 10%">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="waktu" class="form-control" value="<?php echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d') ?>" required>
                      </div>
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Silahkan isi email">
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
                      <label>Nama Alat/Mesin</label>
                      <input type="text" class="form-control" name="alat" id="alat" placeholder="Silahkan isi alat">
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Spesifikasi (Bila berupa kendaraan dinas, mengisi merk & tipe kendaraan dinas)</label>
                      <input type="text" class="form-control" name="spesifikasi" id="spesifikasi" placeholder="Silahkan isi spesifikasi">
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Nomor Inventaris (Bila berupa kendaraan dinas, mengisi nomor plat kendaraan dinas)</label>
                      <input type="text" class="form-control" name="inventaris" id="inventaris" placeholder="Silahkan isi inventaris">
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Jurusan/Unit</label>
                      <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Silahkan isi jurusan">
                    </div>

                    <div class="form-group" style="margin-left: 15px; margin-right:15px">
                      <label>Program Studi</label>
                      <input type="text" class="form-control" name="studi" id="studi" placeholder="Silahkan isi studi">
                    </div>
                   
                    <!-- ruang dan tempat -->
                    <div class="form-group" style="width: 100%; margin-bottom: 10px">
                      <div class="col-md-6">
                        <label><b>Lokasi Alat <b style="color: red">*</b></b></label>
                        <select  class="form-control" name="tempat"  id="tempat" required>
                          <option value="">pilih lokasi alat</option>
                          <?php
                          foreach ($tempat as $data){
                            ?>
                            <option value="<?php echo $data->id_tempat ?>" >
                              <?php echo $data->nama_tempat ?>
                            </option>
                            <?php
                          }
                          ?>
                        </select> 
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6">
                        <label><b>Lokasi Alat/Ruangan <b style="color: red">*</b></b></label>
                        <select class="form-control ruang" name="ruang" id="ruang" required>
                          <option value="">pilih ruang kejadian</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="width: 100%">
                      <div class="col-md-6" style="margin-bottom: 20px; margin-top: 10px">
                        <label><b>Kategori <b style="color: red">*</b></b></label>
                        <select class="form-control" name="kategori"  id="kategori" required>
                          <option value="">pilih kategori pengaduan</option>
                          <?php
                          foreach ($kategori as $data)
                          {
                            ?>
                            <option value="<?php echo $data->id_kategori ?>"><?php echo $data->kategori ?></option>
                            <?php
                          }
                          ?>
                        </select> 
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6" style="margin-bottom: 20px; margin-top: 10px">
                        <label><b>Jenis <b style="color: red">*</b></b></label>
                        <select class="form-control jenis" name="jenis" id="jenis" required>
                          <option value="">pilih jenis pengaduan</option>
                          <?php
                          foreach ($jenis as $data)
                          {
                            ?>
                            <option value="<?php echo $data->id_jenis ?>"><?php echo $data->nama_jenis ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                  </div>

                  <!-- kategori dan jenis -->
                  <div class="form-group" style="margin-left: 15px">
                    <label>Seberapa sering terjadi</label>
                    <select class="form-control" name="kejadian" style="width: 48%;">
                      <option value="">
                        -------------------------------------- frekuensi -------------------------------------------
                      </option>
                      <option value="pertama">Pertama kali</option>
                      <option value="beberapa kali">Beberapa kali</option>
                    </select>
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Kerusakan</label>
                    <input type="text" class="form-control" name="penyebab" id="penyebab" placeholder="Silahkan isi kerusakan">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Nama Bahan</label>
                    <input type="text" class="form-control" name="nama_bahan" id="nama_bahan" placeholder="Silahkan isi bahan">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Jumlah Bahan</label>
                    <input type="text" class="form-control" name="jumlah_bahan" id="jumlah_bahan" placeholder="Silahkan isi jumlah bahan">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Keperluan</label>
                    <input type="text" class="form-control" name="keperluan" id="keperluan" placeholder="Silahkan isi keperluan">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Efek kejadian <b style="color: red">*</b></label>
                    <input type="text" class="form-control" name="efek" id="efek" placeholder="Silahkan isi efek" required>
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Silahkan deskripsikan kejadian <b style="color: red">*</b></label>
                    <textarea class="form-control" name="deskripsi" rows="3" placeholder="text..." required></textarea>
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Data Tambahan</label>
                    <textarea class="form-control" name="tindaklanjut" rows="3" placeholder="text ..."></textarea>
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Dokumentasi Alat (maksimal 2 Mb):</label>
                    <input type="file" name="gambar">
                    <input type="hidden" name="nama_pengguna" value="<?php echo $this->session->userdata('nama_pengguna') ?>">
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
