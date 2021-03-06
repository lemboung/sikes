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
              <small>Formulir pendaftaran keluarga baru</small>
            </h1>";
          } else {
            echo "<h1>Edit Data Keluarga</h1>";
          }?>

          <?php  if ($status == "edit") {
            $idkk = $this->uri->segment(3);
          } ?>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <?php if ($status == 'baru') {
              echo "<li class=\"active\">Pendaftaran Keluarga Baru</li>";
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
              <?php if(empty($family_data)){
                $idkk = '';
                $alamat = '';
                $RT = '';
                $RW = '';
                $kelurahan = '';
                $kecamatan = '';
                $kota = '';
                $pembayaran = '';
              }
              else {
                foreach ($family_data as $fd) {
                  $idkk = $fd->id_kepala_keluarga;
                  $alamat = $fd->alamat;
                  $RT = $fd->RT;
                  $RW = $fd->RW;
                  $kelurahan = $fd->kelurahan;
                  $kecamatan = $fd->kecamatan;
                  $kota = $fd->kota;
                  $pembayaran = $fd->pembayaran;
                }
              } ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Data Keluarga</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                if ($status == 'baru') {
                  echo form_open_multipart('Data_keluarga/insert_keluarga');
                } elseif ($status == 'edit') {
                  echo form_open_multipart('Data_keluarga/update_keluarga');
                  echo "<input type='hidden' class='form-control'  value='".$idkk."' name='idkk'>";
                }
                ?>

                  <div class="box-body">
                    <div class="form-group">
                      <label>alamat</label>
                      <input type="text" class="form-control" value="<?php echo $alamat; ?>" placeholder="Masukkan alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                      <label>Kota/Kabupaten</label>
                      <input type="text" class="form-control" value="<?php echo $kota; ?>" placeholder="Masukkan Kota/Kabupaten" name="kota" required>
                    </div>
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <input type="text" class="form-control" value="<?php echo $kecamatan; ?>" placeholder="Masukkan Kecamatan" name="kecamatan" required>
                    </div>
                    <div class="form-group">
                      <label>Desa/Kelurahan</label>
                      <input type="text" class="form-control"  value="<?php echo $kelurahan; ?>" placeholder="Masukkan Desa/Kelurahan" name="kelurahan" required>
                    </div>
                    <div class="form-group">
                      <label>RT</label>
                      <input type="number" class="form-control"  value="<?php echo $RT; ?>" placeholder="00" name="rt" required>
                    </div>
                    <div class="form-group">
                      <label>RW</label>
                      <input type="number" class="form-control" value="<?php echo $RW; ?>" placeholder="00" name="rw" required>
                    </div>
                    <div class="form-group">
                      <label>Pembayaran</label>
                      <input type="text" class="form-control"  value="<?php echo $pembayaran; ?>"placeholder="Masukkan Pembayaran" name="pembayaran" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
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
