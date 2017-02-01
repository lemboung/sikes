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
                  $a = "";
                  $b = "";
                  $c = "";
                  $d = "";
                  $e = "";
                  $f = "";
                  $g = "";
                  $h = "";
                  $i = "";
                  $j = "";
                  $k = "";
                  $l = "";
                  $m = "";
                  $n = "";
                  $o = "";
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
                  <!-- <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" /> -->
                  <div class="box-body">
                    <!-- <div class="form-group">
                      <label>luas bangunan / lahan</label>
                      <input type="text" class="form-control" value="<?php echo $luas; ?>" placeholder="Masukkan luas bangunan" style="width:50%;" name="luas_bangunan_lahan" required>
                    </div> -->
                    <table class="table-bordered table-striped">
                      <thead>
                        <th>No</th>
                        <th>Skor</th>
                      </thead>
                      <tbody>
                        <?php for ($i=1; $i < 16; $i++) { ?>
                          <tr>
                            <td width="20%"><?php echo $i; ?></td>
                            <td>
                              <?php
                                for ($j=0; $j < 5; $j++) {
                                  if ($a === 0) {
                                    echo "<input type='radio' name='".$i."' value='".$j."' checked='checked'> ".$j." ";
                                  } else {
                                    echo "<input type='radio' name='".$i."' value='".$j."' > ".$j." ";
                                  }
                                }
                              ?>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <th>No</th>
                        <th>Skor</th>
                      </tfoot>
                    </table>
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
