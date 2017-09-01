<!DOCTYPE html>
<html>
  <head>
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
            <b>DASHBOARD</b>
          </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>+</h3>
                  <p><b>Tambah keluarga</b></p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-plus"></i>
                </div>
                <a href="<?php echo base_url("Data_keluarga/tambah_keluarga"); ?>" class="small-box-footer">Tambah <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>23</h3>
                  <p><b>Keluarga Terdaftar</b></p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo base_url("Data_keluarga"); ?>" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php if($this->session->userdata('tipe') == 'Dokter'){?>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>143</h3>
                    <p><b>Pasien Terdaftar</b></p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <a href="<?php echo base_url("Pemeriksaan"); ?>" class="small-box-footer">Daftar Pasien <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            
            <?php } ?>
          </div><!-- /.row -->
          <!-- Main row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <b>Information System Research Group Filkom 2016</b>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."style/" ?>js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."style/" ?>js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."style/" ?>js/app.min.js"></script>
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
      });
    </script>
  </body>
</html>
