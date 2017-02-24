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

      <?php include("header.php") ?>
      <!-- Left side column. contains the logo and sidebar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pendataan Ekonomi Keluarga
          </h1>

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/daftar_keluarga";?>"><i class="fa fa-users"></i> Daftar Keluarga</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/anggota_keluarga/".$idkk;?>"><i class="fa fa-users"></i> Anggota Keluarga</a></li>
            <li class="active">Pendataan Ekonomi Keluarga</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-push-3 col-md-6">
              <!-- general form elements -->
              <?php if (empty($economic_data)) {
                  $luas = "";
                  $status_kep = "";
                  $daya = "";
                  $sumber = "";
                  $penopang = "";
              } else {
                foreach ($economic_data as $ed) {
                  $luas = $ed->luas_bangunan_lahan;
                  $status_kep = $ed->status_kepemilikan_rumah;
                  $daya = $ed->daya_listrik;
                  $sumber = $ed->sumber_ekonomi;
                  $penopang = $ed->penopang_ekonomi;
                }
              }?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Data Ekonomi keluarga</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                if ($status == "baru") {
                  echo form_open_multipart('Data_sosial/insert_data_ekonomi');
                } elseif ($status == "edit") {
                  echo form_open_multipart('Data_sosial/update_data_ekonomi');
                }
                ?>
                  <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                  <div class="box-body">
                    <div class="form-group">
                      <label>luas bangunan / lahan</label>
                      <input type="text" class="form-control" value="<?php echo $luas; ?>" placeholder="Masukkan luas bangunan" style="width:50%;" name="luas_bangunan_lahan" required>
                    </div>
                    <div class="form-group">
                      <label>Status Kepemilikan</label></br>
                      <select class="form-control" style="width:50%;" data-placeholder="pilih kepemilikan"  name="status_kepemilikan">
                          <?php if ($status_kep == 'Milik Sendiri') {
                            echo "<option value='Milik Sendiri' selected=''>Milik Sendiri</option>";
                          } else {
                            echo "<option value='Milik Sendiri'>Milik Sendiri</option>";
                          }
                          if ($status_kep == 'Milik Orang tua') {
                            echo "<option value='Milik Orang tua' selected=''>Milik Orang tua</option>";
                          } else {
                            echo "<option value='Milik Orang tua'>Milik Orang tua</option>";
                          }
                          if ($status_kep == 'Sewa') {
                            echo "<option value='Sewa' selected=''>Sewa</option>";
                          } else {
                            echo "<option value='Sewa'>Sewa</option>";
                          }
                          if ($status_kep == 'Milik Kerabat') {
                            echo "<option value='Milik Kerabat' selected=''>Milik Kerabat</option>";
                          } else {
                            echo "<option value='Milik Kerabat'>Milik Kerabat</option>";
                          }
                          if ($status_kep == 'lain') {
                            echo "<option value='lain' selected=''>lain</option>";
                          } else {
                            echo "<option value='lain'>lain</option>";
                          }
                          ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Daya Listrik</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih daya listrik"  name="daya_listrik">
                        <?php if ($daya == '450 VA') {
                          echo "<option value='450 VA' selected=''>450 VA</option>";
                        } else {
                          echo "<option value='450 VA'>450 VA</option>";
                        }
                        if ($daya == '900 VA') {
                          echo "<option value='900 VA' selected=''>900 VA</option>";
                        } else {
                          echo "<option value='900 VA'>900 VA</option>";
                        }
                        if ($daya == '1300 VA') {
                          echo "<option value='1300 VA' selected=''>1300 VA</option>";
                        } else {
                          echo "<option value='1300 VA'>1300 VA</option>";
                        }
                        if ($daya == '2200 VA') {
                          echo "<option value='2200 VA' selected=''>2200 VA</option>";
                        } else {
                          echo "<option value='2200 VA'>2200 VA</option>";
                        }
                        if ($daya == '>2200 VA') {
                          echo "<option value='>2200 VA' selected=''>>2200 VA</option>";
                        } else {
                          echo "<option value='>2200 VA'>>2200 VA</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Sumber Ekonomi</label></br>
                      <select class="select2" style="width:50%;" multiple="multiple"  data-placeholder="pilih sumber ekonomi"  name="sumber_ekonomi[]">
                          <?php if ($sumber == "Pegawai") {
                            echo "<option value='Pegawai' selected=''>Pegawai</option>";
                          }else {
                            echo "<option value='Pegawai'>Pegawai</option>";
                          }
                          if ($sumber == "Wirausaha") {
                            echo "<option value='Wirausaha' selected=''>Wirausaha</option>";
                          }else {
                            echo "<option value='Wirausaha'>Wirausaha</option>";
                          }
                          if ($sumber == "Bantuan keluarga") {
                            echo "<option value='Bantuan keluarga' selected=''>Bantuan keluarga</option>";
                          }else {
                            echo "<option value='Bantuan keluarga'>Bantuan keluarga</option>";
                          }
                          if ($sumber == "Lain") {
                            echo "<option value='Lain' selected=''>Lain<option>";
                          }else {
                            echo "<option value='Lain'>Lain</option>";
                          }
                          ?>
                          <option value='Wirausaha'>Wirausaha</option>";
                          <option value='Bantuan Keluarga'>Bantuan Keluarga</option>";
                          <option value='Lain'>Lain</option>";
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Penopang Ekonomi</label></br>
                      <select class="select2" style="width:50%;" multiple="multiple"  data-placeholder="pilih penopang ekonomi"  name="penopang_ekonomi[]">
                        <?php if (strpos($penopang, 'Suami') !== false) {
                          echo "<option value='Suami' selected=''>Suami</option>";
                        } else {
                          echo "<option value='Suami'>Suami</option>";
                        }
                        if (strpos($penopang, 'Istri') !== false) {
                          echo "<option value='Istri' selected=''>Istri</option>";
                        } else {
                          echo "<option value='Istri'>Istri</option>";
                        }
                        if (strpos($penopang, 'Anak') !== false) {
                          echo "<option value='Anak' selected=''>Anak</option>";
                        } else {
                          echo "<option value='Anak'>Anak</option>";
                        }
                        if (strpos($penopang, 'Lain') !== false) {
                          echo "<option value='Lain' selected=''>Lain</option>";
                        } else {
                          echo "<option value='Lain'>Lain</option>";
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
        <!-- <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div> -->
        <!-- <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. -->
        <b>Information System Research Group Filkom 2016</b>
      </footer>

      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
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
