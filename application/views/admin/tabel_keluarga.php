<!DOCTYPE html>
<html>
  <head>
    <?php include("head.php"); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/" ?>plugins/datatables/dataTables.bootstrap.css">
  </head>
  <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

      <?php include("header.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Keluarga
            <small>Kelola Daftar Keluarga</small>
          </h1>

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"> Daftar Keluarga</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
            <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
            <div class="col-xs-12">
              <a href="<?php echo base_url("")."Data_keluarga/tambah_keluarga"; ?>"><button type="submit" class="btn btn-primary"> + Data Keluarga baru</button></a>
              <br><br>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Keluarga</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>kecamatan</th>
                        <th>kelurahan</th>
                        <th>Status Kes Primer</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($pasien as $p) {
                       ?>
                      <tr>
                        <td><?php echo $p->id_kepala_keluarga; ?></td>
                        <td><?php echo $p->nama; ?></td>
                        <td><?php echo $p->alamat; ?></td>
                        <td><?php echo $p->kecamatan ?></td>
                        <td><?php echo $p->kelurahan ?></td>
                        <td><?php echo $p->status_kes_primer; ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-primary btn-sm"  href="<?php echo base_url()."Data_keluarga/anggota_keluarga/".$p->id_kepala_keluarga; ?>"><i class="fa fa-users"></i></a>
                            <a class="btn btn-warning btn-sm"  href="<?php echo base_url()."Data_keluarga/edit_data/".$p->id_kepala_keluarga;  ?>"><i class="fa fa-pencil"></i></a>
                          </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <tr>
                          <th>id</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>kecamatan</th>
                          <th>kelurahan</th>
                          <th>Status Kes Primer</th>
                          <th>Action</th>
                        </tr>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <b>Information System Research Group Filkom 2016</b>
      </footer>
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
    <script src="<?php echo base_url()."style/admin/" ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."style/admin/" ?>dist/js/app.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "scrollX": true
        });
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
