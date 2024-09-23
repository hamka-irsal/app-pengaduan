<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pengaduan</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="asset/img/favicon.png" rel="icon">
  <link href="asset/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="asset/vendor/aos/aos.css" rel="stylesheet">
  <link href="asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
  <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?> rel="stylesheet" type="text/css">

  <!-- Main CSS File -->
  <link href="asset/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Shuffle
  * Template URL: https://bootstrapmade.com/bootstrap-3-one-page-template-free-shuffle/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?php echo base_url('Home') ?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="asset/img/logo.png" alt=""> -->
        <h1 class="sitename">Politeknik Negeri Ujung Pandang</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo base_url('Home') ?>">Home</a></li>
          <li><a href="<?php echo base_url('Visimisi') ?>">Visi & Misi</a></li>
          <li><a href="<?php echo base_url('Foto_kegiatan') ?>">Foto Kegiatan</a></li>
          <!-- <li><a href="<?php echo base_url('Cek_laporan') ?>">Cek Laporan</a></li> -->
          <li><a href="<?php echo base_url('Login/login_karyawan') ?>" class="btn-get-started">Login Admin</a></li>
          <li><a href="<?php echo base_url('login') ?>" class="btn-get-started">Login User</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

      <!-- Page Content -->
      <div class="container">
        <!-- <h2 class="page-header"><img src="<?php //echo base_url('img/ugm.gif') ?>" style="width: auto; height: 60px; margin-right: 10px"> SISTEM INFORMASI PENGADUAN</h2> -->
        <div class="row">
          <div class="col-lg-12">
            <center>
				<h1 class="page-header">FORM PENGADUAN</h1>
            </center>

            <form action="<?php echo base_url('user/insert_data') ?>" method="POST" role="form" enctype="multipart/form-data">

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
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Silahkan isi password">
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
                    <!-- <div class="form-group" style="width: 100%; margin-bottom: 10px">
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
                    </div> -->

                  <!-- kategori dan jenis -->
                  <!-- <div class="form-group" style="margin-left: 15px">
                    <label>Seberapa sering terjadi</label>
                    <select class="form-control" name="kejadian" style="width: 48%;">
                      <option value="">
                        -------------------------------------- frekuensi -------------------------------------------
                      </option>
                      <option value="pertama">Pertama kali</option>
                      <option value="beberapa kali">Beberapa kali</option>
                    </select>
                  </div> -->

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Lokasi Alat (Kampus PNUP)</label>
                    <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Silahkan isi lokasi alat">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Lokasi Alat/Ruangan</label>
                    <input type="text" class="form-control" name="ruang" id="ruang" placeholder="Silahkan isi lokasi alat/ruang">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Kerusakan</label>
                    <input type="text" class="form-control" name="penyebab" id="penyebab" placeholder="Silahkan isi kerusakan">
                  </div>

                  <!-- <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Uraian</label>
                    <input type="text" class="form-control" name="uraian" id="uraian" placeholder="Silahkan isi uraian">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Penyedia</label>
                    <input type="text" class="form-control" name="penyedia" id="penyedia" placeholder="Silahkan isi penyedia">
                  </div>

                  <div class="form-group" style="margin-left: 15px; margin-right:15px">
                    <label>Nama Bahan</label>
                    <input type="text" class="form-control" name="bahan" id="bahan" placeholder="Silahkan isi bahan">
                  </div> -->

                  <!-- <div class="form-group" style="margin-left: 15px; margin-right:15px">
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
                  </div> -->

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

<script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asset/vendor/php-email-form/validate.js"></script>
  <script src="asset/vendor/aos/aos.js"></script>
  <script src="asset/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="asset/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="asset/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="asset/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="asset/js/main.js"></script>

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
                    url : "<?php echo base_url('Laporan_kerusakan/ruang');?>", //ngarahin ke function ruang di cform
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


