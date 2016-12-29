<!DOCTYPE html>
<html>
  <head>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/" ?>plugins/datatables/dataTables.bootstrap.css">
    <?php include("head.php"); ?>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

      <?php include("header.php") ?>
      <?php include('getDataPasien.php'); ?>
      <!-- Left side column. contains the logo and sidebar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Status Pasien
          </h1>

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url("Pemeriksaan"); ?>"><i class="fa fa-home"></i> Daftar Pasien</a></li>
            <li class="active"> Input Status Pasien</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
            <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
            <div class="col-lg-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pasien</h3>
                  <br><br>
                  <table id="example" class="table table-bordered table-striped">
                    <tbody>
                      <tr>
                        <th>Nama Pasien</th> <td>  <?php echo $nama; ?></td>
                      </tr>
                      <tr>
                        <th>Umur</th> <td> <?php echo $umur; ?></td>
                      </tr>
                      <tr>
                        <th>Jenis Kelamin</th> <td> <?php
                        if ($jenis_kelamin == 1) {
                          echo "laki-laki";
                        } elseif ($jenis_kelamin == 2) {
                          echo "perempuan";
                        }
                        ?></td>
                      </tr>
                      <tr>
                        <th>Nama Kepala Keluarga</th> <td> <?php echo $namakk; ?></td>
                      </tr>
                      <tr>
                        <th>Alamat</th> <td> <?php echo $alamat; ?></td>
                      </tr>
                      <tr>
                        <th>Pekerjaan</th> <td> <?php echo $pekerjaan; ?></td>
                      </tr>
                      <tr>
                        <th>Riwayat Penyakit Keluarga</th> <td> <?php echo $riwayat_sakit; ?></td>
                      </tr>
                      <tr>
                        <th>Alergi Obat</th> <td> <?php echo $alergi_obat; ?></td>
                      </tr>
                      <tr>
                        <th>Alergi Makanan</th> <td> <?php echo "belum ada data"; ?></td>
                      </tr>
                      <tr>
                        <th>Status Kes Primer</th> <td> <?php echo $status_kes; ?></td>
                      </tr>
                      <tr>
                        <th>Pembayaran</th> <td> <?php echo $pembayaran; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pemeriksaan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Anamnesa</th>
                        <th>Pemeriksaan Fisik / TTV</th>
                        <th>Hasil Pemeriksaan Penunjang</th>
                        <th>Diagnosa</th>
                        <th>Terapi</th>
                        <th>Perawat Bertugas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($status_pasien as $sp) {
                        # code...
                       ?>
                      <tr>
                        <td><?php echo $sp->tanggal; ?></td>
                        <td><?php echo $sp->anamnesa; ?></td>
                        <td>
                          <ul>
                            <li>TD :<?php echo $sp->td; ?></li>
                            <li>RR :<?php echo $sp->rr; ?></li>
                            <li>Nadi :<?php echo $sp->nadi; ?></li>
                            <li>Suhu :<?php echo $sp->suhu; ?></li>
                          </ul>
                        </td>
                        <td><?php echo $sp->hasil_pemeriksaan_penunjang; ?></td>
                        <td><?php echo $sp->diagnosa; ?></td>
                        <td><?php echo $sp->terapi; ?></td>
                        <td><?php echo $sp->paraf; ?></td>
                      </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <tr>
                          <th>Tanggal</th>
                          <th>Anamnesa</th>
                          <th>Pemeriksaan Fisik / TTV</th>
                          <th>Hasil Pemeriksaan Penunjang</th>
                          <th>Diagnosa</th>
                          <th>Terapi</th>
                          <th>Perawat Bertugas</th>
                        </tr>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row">
            <?php $nik = $this->uri->segment(3); ?>
          <!-- Left col -->
          <div class="col-md-6">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Form Input Data Status Pasien</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form action="<?php echo base_url("Pemeriksaan/insert_data_kesehatan"); ?>" method="post">
                    <input type="hidden" class="form-control" value="<?php echo $nik; ?>" name="nik">
                    <div class="form-group">
                      <label>Anamnesa</label>
                      <input type="text" class="form-control" placeholder="Masukkan Anamnesa" name="anamnesa" required>
                    </div>
                    <div class="form-group">
                      <label>Tekanan Darah</label>
                      <input type="text" class="form-control" placeholder="Masukkan Tekanan Darah" name="td" required>
                    </div>
                    <div class="form-group">
                      <label>RR</label>
                      <input type="text" class="form-control" placeholder="Masukkan rr"  name="rr" required>
                    </div>
                    <div class="form-group">
                      <label>Nadi</label>
                      <input type="number" class="form-control"  placeholder="Masukkan Nadi" name="nadi" required>
                    </div>
                    <div class="form-group">
                      <label>Suhu</label>
                      <input type="number" class="form-control" placeholder="Masukkan Suhu" name="suhu" required>
                    </div>
                    <div class="form-group">
                      <label>Hasil Pemeriksaan Penunjang</label>
                      <input type="text" class="form-control" placeholder="Hasil Pemeriksaan Penunjang" name="hasil_pemeriksaan_penunjang">
                    </div>
                    <div class="form-group">
                      <label>Diagnosa</label>
                      <input type="text" class="form-control" placeholder="Diagnosa" name="diagnosa">
                    </div>
                    <div class="form-group">
                      <label>Terapi</label>
                      <input type="text" class="form-control" placeholder="Terapi" name="terapi">
                    </div>
                    <input type="hidden" value="<?php echo $paraf; ?>"  name="paraf">
                    <div class>
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                      <button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>
                    </div><!-- /.col -->
                  </form>
                </div><!-- /.item -->
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </div><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <b>Information System Research Group Filkom 2016</b>
      </footer>
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
    <script src="<?php echo base_url()."style/admin/" ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."style/admin/" ?>dist/js/app.min.js"></script>
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
