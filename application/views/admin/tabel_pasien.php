<!DOCTYPE html>
<html>
  <head>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/" ?>plugins/datatables/dataTables.bootstrap.css">
    <?php include("head.php"); ?>
  </head>
  <body class="skin-green sidebar-mini">
        <div class="wrapper">

          <?php include("header.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Pasien
          </h1>

          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"> Daftar Pasien</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
            <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
            <div class="col-md-push-1 col-md-10">
              <br><br>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Pasien</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Umur</th>
                        <th>Pekerjaan</th>
                        <th>Status Kes Primer</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($pasien as $p) {
                        # code...
                       ?>
                      <tr>
                        <td><?php echo $p->nama; ?></td>
                        <td><?php echo $p->alamat; ?></td>
                        <td><?php $bday = new DateTime ($p->tanggal_lahir);
                                  $today = new DateTime();
                                  $umur = $today->diff($bday);
                                  echo $umur->y." Th"; ?></td>
                        <td><?php echo $p->pekerjaan; ?></td>
                        <td><?php echo $p->status_kes_primer; ?></td>
                        <td>
                          <div class="btn-group">
                            <?php if ($this->session->userdata('tipe')=="Perawat") {
                              echo "<a class=\"btn btn-danger\" href=\"".base_url("Pemeriksaan/input_status/").$p->nik."\"><i class='fa fa-heartbeat'></i></a>";
                            } elseif ($this->session->userdata('tipe')=="Dokter") {
                              echo "<a class=\"btn btn-danger\" href=\"".base_url("Pemeriksaan/input_status/").$p->nik."\"><i class='fa fa-heartbeat'></i></a>";
                              echo "<a href=\"".base_url()."Pemeriksaan/periksa/".$p->nik."\"><button type=\"button\" class=\"btn btn-danger\"><i class='fa fa-plus-square' ></i></button></a>";
                            } else {
                              echo "<a href=\"".base_url()."Pemeriksaan/input_status/".$p->nik."\"><button type=\"button\" class=\"btn btn-danger\">input status</button></a>";
                              echo "<a href=\"".base_url()."Pemeriksaan/periksa/".$p->nik."\"><button type=\"button\" class=\"btn btn-danger\">periksa</button></a>";
                            }?>
                          </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <tr>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Umur</th>
                          <th>Pekerjaan</th>
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
        <!-- <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div> -->
        <!-- <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. -->
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
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()."style/admin/" ?>dist/js/demo.js"></script>
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
          "autoWidth": true
        });
      });
    </script>
  </body>
</html>
