<!DOCTYPE html>
<html>
  <head>
    <!-- select2 plugins -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/select2.min.css">
    <?php include("head.php"); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/dataTables.bootstrap.css">

  </head>
  <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

      <?php include("header.php"); ?>
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
            <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
            <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
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
                      <?php 
                      $i = 1;
                      foreach ($work_history as $wh) {
                        
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
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url()."Riwayat_pekerjaan/edit/".$idkk."/".$wh->dk_nik."/".$wh->id_riwayat_pekerjaan; ?>"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm"href="<?php echo base_url()."Riwayat_pekerjaan/hapus/".$idkk."/".$wh->dk_nik."/".$wh->id_riwayat_pekerjaan;  ?>"><i class="fa fa-trash"></i></a>
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
              $id_riwayat_pekerjaan = '';
              $divisi = '';
              $sub_divisi = '';
              $lama_kerja = '';
              $jenis_aktivitas = '';
              $bobot_aktivitas = '';
            }
            else {
              foreach ($edit_history as $eh) {
                $id_riwayat_pekerjaan = $eh->id_riwayat_pekerjaan;
                $divisi = $eh->divisi;
                $sub_divisi = $eh->sub_divisi;
                $lama_kerja = $eh->lama_kerja;
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
                    <input type="hidden" name="id_riwayat_pekerjaan" value="<?php echo $id_riwayat_pekerjaan; ?>" />
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
                      <select class="select2" style="width:100%;" data-placeholder="Pilih Bobot"  name="bobot_aktivitas" required>
                        <?php if ($bobot_aktivitas == "Ringan") {
                          echo "<option value='Ringan' selected=''>Ringan</option>";
                        } else {
                          echo "<option value='Ringan'>Ringan</option>";
                        }
                        if ($bobot_aktivitas == "Sedang") {
                          echo "<option value='Sedang' selected=''>Sedang</option>";
                        } else {
                          echo "<option value='Sedang'>Sedang</option>";
                        }
                        if ($bobot_aktivitas == "Berat") {
                          echo "<option value='Berat' selected=''>Berat</option>";
                        } else {
                          echo "<option value='Berat'>Berat</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class>
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                      <?php if($status == "baru"){ echo '<button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>';?>
                      <?php } else { ?>
                      <a href="<?php echo base_url("Riwayat_pekerjaan/tabel/").$idkk."/".$nik; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                      <?php } ?>
                    </div><!-- /.col -->
                  </form>
                </div><!-- /.item -->

              </div>
            </div>
          </section><!-- /.Left col -->
        </div><!-- /.row (main row) -->
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
