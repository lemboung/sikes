<!DOCTYPE html>
<html>
  <head>
    <!-- select2 plugins -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/select2.min.css">
    <?php include("head.php"); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/"?>plugins/datatables/dataTables.bootstrap.css">

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
            Riwayat Penyakit Keluarga
            <small>Kelola Data Riwayat Penyakit Keluarga</small>
          </h1>
          <?php $nik = $this->uri->segment(4);
            $idkk = $this->uri->segment(3);
            ?>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url("Data_keluarga"); ?>"><i class="fa fa-home"></i> Daftar Keluarga</a></li>
            <li><a href="<?php echo base_url("Data_keluarga/anggota_keluarga/").$idkk;?>"><i class="fa fa-users"></i> Anggota Keluarga</a></li>
            <li class="active"> Riwayat Pekerjaan</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Riwayat Pekerjaan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Divisi</th>
                        <th>Sub Divisi</th>
                        <th>Lama Kerja</th>
                        <th>Jenis Aktivitas</th>
                        <th>Bobot Aktivitas</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($work_history as $wh) {
                        $i = 1;
                       ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $wh->divisi; ?></td>
                        <td><?php echo $wh->sub_divisi; ?></td>
                        <td><?php echo $wh->lama_kerja; ?></td>
                        <td><?php echo $wh->jenis_aktivitas; ?></td>
                        <td><?php echo $wh->bobot_aktivitas; ?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="<?php echo base_url()."Admin/edit_riwayat_pekerjaan/".$wh->dk_nik; ?>">edit</a></li>
                              <li><a href="<?php echo base_url()."Admin/hapus_riwayat_pekerjaan/".$wh->dk_nik;  ?>">hapus</a></li>
                            </ul>
                          </div>
                        </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Divisi</th>
                        <th>Sub Divisi</th>
                        <th>Lama Kerja</th>
                        <th>Jenis Aktivitas</th>
                        <th>Bobot Aktivitas</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row">
          <!-- Left col -->
          <section class="col-lg-6">
            <!-- Chat box -->
            <?php if(empty($edit_history)){
              $divisi = '';
              $sub_divisi = '';
              $lama_kerja = '';
              $jenis_aktivitas = '';
              $bobot_aktivitas = '';
            }
            else {
              foreach ($edit_history as $eh) {
                $divisi = $eh->divisi;
                $sub_divisi = $eh->sub_divisi;
                $lama_kerja = $eh->lama_kerjat;
                $jenis_aktivitas = $eh->jenis_aktivitas;
                $bobot_aktivitas = $eh->bobot_aktivitas;
              }
            } ?>
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Form Tambah/Edit Riwayat sakit</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <?php if ($status == "baru") {
                    echo "<form action=\"".base_url()."Riwayat_pekerjaan/insert\" method=\"post\">";
                  } elseif ($status == "edit") {
                    echo "<form action=\"".base_url()."Riwayat_pekerjaan/update\" method=\"post\">";
                  }?>
                  <input type="hidden" name="dk_nik" value="<?php echo $nik; ?>" />
                    <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                    <div class="form-group">
                      <label>Divisi</label></br>
                      <input type="text" class="form-control" value="<?php echo $divisi; ?>" placeholder="divisi" name="divisi" required>
                    </div>
                    <div class="form-group">
                      <label>Sub Divisi</label>
                      <input type="text" class="form-control" value="<?php echo $sub_divisi; ?>" placeholder="sub divisi" name="sub_divisi">
                    </div>
                    <div class="form-group">
                      <label>Lama Kerja</label>
                      <input type="number" class="form-control" value="<?php echo $lama_kerja; ?>" placeholder="bulan" name="lama_kerja" required>
                    </div>
                    <div class="form-group">
                      <label>Jenis Aktivitas</label>
                      <input type="text" class="form-control" value="<?php echo $jenis_aktivitas; ?>" placeholder="jenis aktivitas" name="jenis_aktivitas">
                    </div>
                    <div class="form-group">
                      <label>Bobot Aktivitas</label>
                      <select class="select2" style="width:100%;" data-placeholder="Pilih Bobot" value="<?php echo $bobot_aktivitas; ?>"  name="bobot_aktivitas" required>
                        <option value="Ringan">Ringan</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Berat">Berat</option>
                      </select>
                    </div>
                    <div class>
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                      <?php if($status == "baru"){ echo '<button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>';?>
                      <?php } else { ?>
                      <a href="<?php echo base_url("admin/riwayat_pekerjaan/").$idkk."/".$nik; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                      <?php } ?>
                    </div><!-- /.col -->
                  </form>
                </div><!-- /.item -->

              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->
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
    <script src="<?php echo base_url()."style/admin/" ?>plugins/fastclick/fastclick.min.js"></script>
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
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "scrollX":true
        });
        $(".select2").select2();
      });
    </script>
  </body>
</html>
