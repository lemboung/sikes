<!DOCTYPE html>
<html>
  <head>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/"?>plugins/datatables/dataTables.bootstrap.css">
    <!-- select2 plugins -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/select2.min.css">
    <?php include("head.php"); ?>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

          <?php include("header.php"); ?>
      <!-- Left side column. contains the logo and sidebar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pendataan Perilaku Kesehatan Keluarga
          </h1>

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/daftar_keluarga";?>"><i class="fa fa-users"></i> Daftar Keluarga</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/anggota_keluarga/".$idkk;?>"><i class="fa fa-users"></i> Anggota Keluarga</a></li>
            <li class="active">Pendataan Perilaku Kesehatan Keluarga</li>
          </ol>
        </section>

        <?php if (empty($behavior_data)) {
          $jamkes = "";
          $prev_balita = "";
          $pemeliharaan = "";
          $pengobatan_diri = "";
          $sam = "";
          $spal = "";
          $wc = "";
          $km = "";
          $tc = "";
        } else {
          foreach ($behavior_data as $bd) {
            $idkk = $bd->dkk_id_kepala_keluarga;
            $jamkes = $bd->jaminan_kesehatan;
            $prev_balita = $bd->pelayanan_preventif_balita;
            $pemeliharaan = $bd->pemeliharaan_kes_keluarga;
            $pengobatan_diri = $bd->pelayanan_pengobatan_diri;
            $sam = $bd->sumber_air_minum;
            $spal = $bd->spal;
            $wc = $bd->wc_kloset;
            $km = $bd->kamar_mandi;
            $tc = $bd->tempat_cuci_sendiri;
          }
        }?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-push-3 col-md-6">
              <!-- general form elements -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Data Perilaku Kesehatan Keluarga</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                if ($status == "baru") {
                  echo form_open_multipart('Data_sosial/insert_data_perilaku');
                } elseif ($status == "edit") {
                  echo form_open_multipart('Data_sosial/update_data_perilaku');
                }
                ?>
                  <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                  <div class="box-body">
                    <div class="form-group">
                      <label>Jaminan Kesehatan</label>
                      <input type="text" class="form-control" value="<?php echo $jamkes ?>" style="width:50%;" placeholder="Masukkan Jaminan Kesehatan" style="width:50%;" name="jaminan_kesehatan" required>
                    </div>
                    <div class="form-group">
                      <label>Pelayanan Preventif Bayi / Balita</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih layanan"  name="pelayanan_prev_balita">
                        <?php
                          if ($prev_balita == "Dokter Praktek Umum") {
                            echo "<option value='Dokter Praktek Umum' selected=''>Dokter Praktek Umum</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($prev_balita == "Puskesmas") {
                            echo "<option value='Puskesmas' selected=''>Puskesmas</option>";
                          }else {
                            echo "<option value='Puskesmas'>Puskesmas</option>";
                          }
                          if ($prev_balita == "Perawat/Bidan") {
                            echo "<option value='Perawat/Bidan' selected=''>Perawat/Bidan</option>";
                          }else {
                            echo "<option value='Perawat/Bidan'>Perawat/Bidan</option>";
                          }
                          if ($prev_balita == "Rumah Sakit Spesialis") {
                            echo "<option value='Rumah Sakit Spesialis' selected=''>Rumah Sakit Spesialis</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($prev_balita == "Lain") {
                            echo "<option value='Lain' selected=''>Lain</option>";
                          }else {
                            echo "<option value='Lain'>Lain</option>";
                          }
                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pemeliharaan Kesehatan Keluarga</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih layanan"  name="pemeliharaan_kes_keluarga">
                        <?php
                          if ($pemeliharaan == "Dokter Praktek Umum") {
                            echo "<option value='Dokter Praktek Umum' selected=''>Dokter Praktek Umum</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($pemeliharaan == "Puskesmas") {
                            echo "<option value='Puskesmas' selected=''>Puskesmas</option>";
                          }else {
                            echo "<option value='Puskesmas'>Puskesmas</option>";
                          }
                          if ($pemeliharaan == "Perawat/Bidan") {
                            echo "<option value='Perawat/Bidan' selected=''>Perawat/Bidan</option>";
                          }else {
                            echo "<option value='Perawat/Bidan'>Perawat/Bidan</option>";
                          }
                          if ($pemeliharaan == "Rumah Sakit Spesialis") {
                            echo "<option value='Rumah Sakit Spesialis' selected=''>Rumah Sakit Spesialis</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($pemeliharaan == "Lain") {
                            echo "<option value='Lain' selected=''>Lain</option>";
                          }else {
                            echo "<option value='Lain'>Lain</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pelayanan Pengobatan Diri Sendiri</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih layanan"  name="pelayanan_pengobatan_diri">
                        <?php
                          if ($pengobatan_diri == "Dokter Praktek Umum") {
                            echo "<option value='Dokter Praktek Umum' selected=''>Dokter Praktek Umum</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($pengobatan_diri == "Puskesmas") {
                            echo "<option value='Puskesmas' selected=''>Puskesmas</option>";
                          }else {
                            echo "<option value='Puskesmas'>Puskesmas</option>";
                          }
                          if ($pengobatan_diri == "Perawat/Bidan") {
                            echo "<option value='Perawat/Bidan' selected=''>Perawat/Bidan</option>";
                          }else {
                            echo "<option value='Perawat/Bidan'>Perawat/Bidan</option>";
                          }
                          if ($pengobatan_diri == "Rumah Sakit Spesialis") {
                            echo "<option value='Rumah Sakit Spesialis' selected=''>Rumah Sakit Spesialis</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($pengobatan_diri == "Lain") {
                            echo "<option value='Lain' selected=''>Lain</option>";
                          }else {
                            echo "<option value='Lain'>lain</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Sumber Air Minum</label></br>
                      <select class="select2" multiple="multiple" style="width:50%;" data-placeholder="pilih sumber Air Minum"  name="sumber_air_minum[]">
                        <?php
                          if (strpos($sam, "PDAM") !== false) {
                            echo "<option value='PDAM' selected=''>PDAM</option>";
                          } else {
                            echo "<option value='PDAM'>PDAM</option>";
                          }
                          if (strpos($sam, "Sumur Gali") !== false) {
                            echo "<option value='Sumur Gali' selected=''>Sumur Gali</option>";
                          } else {
                            echo "<option value='Sumur Gali'>Sumur Gali</option>";
                          }
                          if (strpos($sam, "Sumur Pompa") !== false) {
                            echo "<option value='Sumur Pompa' selected=''>Sumur Pompa</option>";
                          } else {
                            echo "<option value='Sumur Pompa'>Sumur Pompa</option>";
                          }
                          if (strpos($sam, "Sungai") !== false) {
                            echo "<option value='Sungai' selected=''>Sungai</option>";
                          } else {
                            echo "<option value='Sungai'>Sungai</option>";
                          }
                          if (strpos($sam, "Galon Kemasan") !== false) {
                            echo "<option value='Galon Kemasan' selected=''>Galon Kemasan</option>";
                          } else {
                            echo "<option value='Galon Kemasan'>Galon Kemasan</option>";
                          }
                          if (strpos($sam, "Galon Isi Ulang") !== false) {
                            echo "<option value='Galon Isi Ulang' selected=''>Galon Isi Ulang</option>";
                          } else {
                            echo "<option value='Galon Isi Ulang'>Galon Isi Ulang</option>";
                          }
                          if (strpos($sam, "Lain") !== false) {
                            echo "<option value='Lain' selected=''>Lain</option>";
                          } else {
                            echo "<option value='Lain'>Lain</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Saluran Pembuangan Air Limbah</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih tipe saluran"  name="spal">
                        <?php if ($spal == "Saluran Limbah Tertutup") {
                          echo "<option value='Saluran Limbah Tertutup' selected=''>Saluran Limbah Tertutup</option>";
                        } else {
                          echo "<option value='Saluran Limbah Tertutup'>Saluran Limbah Tertutup</option>";
                        }
                        if ($spal == "Saluran Limbah Terbuka") {
                          echo "<option value='Saluran Limbah Terbuka' selected=''>Saluran Limbah Terbuka</option>";
                        } else {
                          echo "<option value='Saluran Limbah Terbuka'>Saluran Limbah Terbuka</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>WC Kloset</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih "  name="wc_kloset">
                        <?php
                          if ($wc == 1) {
                            echo "<option value='1' selected=''>Ya</option>";
                          }else {
                            echo "<option value='1'>Ya</option>";
                          }
                          if ($wc == 0) {
                            echo "<option value='0' selected=''>Tidak</option>";
                          }else {
                            echo "<option value='0'>Tidak</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kamar Mandi</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih "  name="kamar_mandi">
                        <?php
                          if ($km == 1) {
                            echo "<option value='1' selected=''>Ya</option>";
                          } else {
                            echo "<option value='1'>Ya</option>";
                          }
                          if ($km == 0) {
                            echo "<option value='0' selected=''>Tidak</option>";
                          } else {
                            echo "<option value='0'>Tidak</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tempat Cuci Tersendiri</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih "  name="tempat_cuci_tersendiri">
                        <?php
                          if ($tc == 1) {
                            echo "<option value='1' selected=''>Ya</option>";
                          } else {
                            echo "<option value='1'>Ya</option>";
                          }
                          if ($tc == 0) {
                            echo "<option value='0' selected=''>Tidak</option>";
                          } else {
                            echo "<option value='0'>Tidak</option>";
                          }
                        ?>
                      </select>
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

      <!-- Control Sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."style/admin/" ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."style/admin/" ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url()."style/admin/" ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."style/admin/" ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url()."style/admin/" ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()."style/admin/" ?>plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."style/admin/" ?>dist/js/app.min.js"></script>
    <!-- select2 js -->
    <script src="<?php echo base_url()."style/" ?>js/select2.full.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()."style/admin/" ?>dist/js/demo.js"></script>
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
        var selectedValues = $("#sourceValues").val().split(',');
        $(".select2").val(selectedValues).trigger("change");
      });
    </script>
  </body>
</html>
