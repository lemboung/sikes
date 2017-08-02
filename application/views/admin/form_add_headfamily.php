<!DOCTYPE html>
<html>
  <head>
    <?php include("head.php"); ?>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

      <?php include("header.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <?php if ($status == 'baru') {
            echo "<h1>
              Pendaftaran Keluarga Baru
              <small>Formulir Data Kepala Keluarga</small>
            </h1>";
          } else {
            echo "<h1>Edit Data Kepala Keluarga</h1>";
          }?>

          <?php  
            $idkk = $this->uri->segment(3);
           ?>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <?php if ($status == 'baru') {
              echo "<li class=\"active\">Formulir Kepala Keluarga</li>";
            } else {
              echo "<li><a href=\"".base_url("Data_keluarga/anggota_keluarga/").$idkk."\"><i class=\"fa fa-users\"></i> Anggota Keluarga</a></li>";
              echo "<li class=\"active\">Edit Keluarga</li>";
            }?>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-push-3 col-md-6">
              <!-- general form elements -->
              <?php if(empty($person)){
              $nik = '';
              $nama = '';
              $tgl_lahir = '';
              $pekerjaan = '';
              $ket_domisili = '';
              $hub_kel = '';
              $status_kawin = '';
              $umur_kawin = '';
            }
            else {
              foreach ($person as $p) {
                $nik = $p->nik;
                $nama = $p->nama;
                $tgl_lahir = $p->tanggal_lahir;
                $pekerjaan = $p->pekerjaan;
                $hub_kel = $p->hubungan_keluarga;
                $ket_domisili = $p->ket_domisili;
                $status_kawin = $p->status_kawin;
                $umur_kawin = $p->umur_kawin;
              }
            } ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Data Keluarga</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php if ($status == 'baru') {
                    echo "<form action=\"".base_url()."Data_keluarga/insert_anggota_keluarga\" method=\"post\">";
                  } elseif ($status == 'edit') {
                    echo "<form action=\"".base_url()."Data_keluarga/update_anggota_keluarga/".$nik."\" method=\"post\">";
                  }
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="number" class="form-control" value="<?php echo $nik; 
                      ?>" placeholder="Masukkan NIK" name="nik" required>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" value="<?php echo $nama; 
                      ?>" placeholder="Masukkan Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                      <label>Tangal Lahir</label>
                      <input type="date" class="form-control" value="<?php echo $tgl_lahir; 
                      ?>"  name="tgl" required>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" placeholder="jenis kelamin" name="jenis_kelamin" required>
                        <?php if ($jenis_kelamin == 1) {
                          echo "<option value='1' selected>Laki-laki</option>";
                        } else {
                          echo "<option value='1' >Laki-laki</option>";
                        }
                        if ($jenis_kelamin == 2) {
                          echo "<option value='2' selected>Perempuan</option>";
                        } else {
                          echo "<option value='2' >Perempuan</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" value="<?php echo $pekerjaan; 
                      ?>" placeholder="Masukkan Pekerjaan" name="pekerjaan" required>
                    </div>
                    <div class="form-group">
                      <label>Hubungan Keluarga</label>
                      <select class="form-control"  placeholder="Hubungan Keluarga" name="hubungan_keluarga" required>
                        <?php if ($hub_kel == "Kepala Keluarga") {
                          echo "<option value='Kepala keluarga' selected>Kepala keluarga</option>";
                        } else {
                          echo "<option value='Kepala keluarga'>Kepala keluarga</option>";
                        }
                        if ($hub_kel == "Istri") {
                          echo "<option value='Istri' selected>Istri</option>";
                        } else {
                          echo "<option value='Istri'>Istri</option>";
                        }
                        if ($hub_kel == "Anak") {
                          echo "<option value='Anak' selected>Anak</option>";
                        } else {
                          echo "<option value='Anak'>Anak</option>";
                        }
                        if ($hub_kel == "Anak Angkat") {
                          echo "<option value='Anak Angkat' selected>Anak Angkat</option>";
                        } else {
                          echo "<option value='Anak Angkat'>Anak Angkat</option>";
                        }
                        if ($hub_kel == "Saudara") {
                          echo "<option value='Saudara' selected>Saudara</option>";
                        } else {
                          echo "<option value='Saudara'>Saudara</option>";
                        }
                        if ($hub_kel == "Lain") {
                          echo "<option value='Lain' selected>Lain</option>";
                        } else {
                          echo "<option value='Lain'>Lain</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Domisili</label>
                      <select class="form-control"  placeholder="keterangan domisili" name="ket_domisili" required>
                        <?php if ($ket_domisili == "Serumah") {
                          echo "<option value='Serumah' selected>Serumah</option>";
                        } else {
                          echo "<option value='Serumah'>Serumah</option>";
                        }
                        if ($ket_domisili == "Tidak Serumah") {
                          echo "<option value='Tidak Serumah' selected>Tidak Serumah</option>";
                        } else {
                          echo "<option value='Tidak Serumah'>Tidak Serumah</option>";
                        }
                        if ($ket_domisili == "Kadang-kadang") {
                          echo "<option value='Kadang-kadang' selected>Kadang-kadang</option>";
                        } else {
                          echo "<option value='Kadang-kadang'>Kadang-kadang</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status Kawin</label>
                      <select class="form-control" value="<?php echo $status_kawin; 
                      ?>" placeholder="Status Kawin" name="status_kawin">
                        <option value="0">Belum Menikah</option>
                        <option value="1">Menikah</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Umur Kawin Pertama</label>
                      <input type="number" class="form-control" value="<?php echo $umur_kawin; ?>"  name="umur_kawin">
                    </div>
                    <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                    <div class>
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                      <?php if($status == "baru"){ echo '<button type="reset" 
                      class="btn btn-warning btn-block btn-flat">Batal</button>';?>
                      <?php } else { ?>
                      <a href="<?php echo base_url()."Data_keluarga/anggota_keluarga/".$idkk; 
                      ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                      <?php } ?>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <b>Information System Research Group Filkom 2016</b>
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."style/" ?>js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."style/" ?>js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url()."style/" ?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."style/" ?>js/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."style/" ?>js/app.min.js"></script>
    <!-- select2 js -->
    <script src="<?php echo base_url()."style/" ?>js/select2.full.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        $(".select2").select2();
      });
    </script>
  </body>
</html>
