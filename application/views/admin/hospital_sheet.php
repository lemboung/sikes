<!DOCTYPE html>
<html>
  <head>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/dataTables.bootstrap.css">
    <!-- select2 plugins -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/select2.min.css">
    <?php include("head.php"); ?>
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
          <?php $idkk = $this->uri->segment(3); ?>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/daftar_keluarga";?>"><i class="fa fa-users"></i> Daftar Keluarga</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/anggota_keluarga/".$idkk;?>"><i class="fa fa-users"></i> Anggota Keluarga</a></li>
            <li class="active"> Riwayat Penyakit Keluarga</li>
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
                  <h3 class="box-title">Riwayat penyakit Keluarga</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenis Sakit, Kecelakaan, Meninggal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i = 1;
                      foreach ($family_sick as $fs) {
                        
                       ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $fs->tanggal; ?></td>
                        <td><?php echo $fs->nama; ?></td>
                        <td><?php $bday = new DateTime ($fs->tanggal_lahir);
                                  $today = new DateTime();
                                  $umur = $today->diff($bday);
                                  echo $umur->y." Th"; ?></td>
                        <td><?php
                        $i++;
                        if ($fs->jenis_kelamin==1) {
                          echo "laki-laki";
                        }
                        elseif ($fs->jenis_kelamin==2) {
                          echo "perempuan";
                        } ?></td>
                        <td><?php echo $fs->jenis_sakit; ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url()."Riwayat_penyakit/edit/".$idkk."/".$fs->id_riwayat_penyakit; ?>"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm"href="<?php echo base_url()."Riwayat_penyakit/hapus/".$idkk."/".$fs->id_riwayat_penyakit;  ?>"><i class="fa fa-trash"></i></a>
                          </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenis Sakit, Kecelakaan, Meninggal</th>
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
            <?php if(empty($sick)){
              $id_riwayat_penyakit = '';
              $dknik = '';
              $tanggal = '';
              $jenis_sakit = '';
            }
            else {
              foreach ($sick as $s) {
                $id_riwayat_penyakit = $s->id_riwayat_penyakit;
                $dknik = $s->dk_nik;
                $tanggal = $s->tanggal;
                $jenis_sakit = $s->jenis_sakit;
              }
            } ?>
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Form Tambah/Edit Riwayat sakit</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <div class="item">
                  <?php if ($status == "baru") {
                    echo "<form action='".base_url("Riwayat_penyakit/insert_data_penyakit")."' method='post'>";
                  } elseif ($status == "edit") {
                    echo "<form action='".base_url("Riwayat_penyakit/update_data_penyakit")."' method='post'>";
                  }
                  ?>
                    <input type="hidden" name="id_rp" value="<?php echo $id_riwayat_penyakit; ?>" />
                    <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                    <div class="form-group">
                      <label>Anggota Keluarga</label></br>
                      <select class="select2" style="width:100%;" data-placeholder="Pilih Anggota Keluarga"  name="dk_nik" required>
                        <?php foreach ($family as $f) {
                          if (strpos($dknik, $f->nik) !== false) {
                            echo "<option value='$f->nik' selected=''>$f->nama</option>";
                          }else {
                            echo "<option value='$f->nik'>$f->nama</option>";
                          }
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" class="form-control" value="<?php echo $tanggal; ?>" placeholder="Tanggal" name="tanggal" required>
                    </div>

                    <div class="form-group">
                      <label>Jenis Sakit, Kecelakaan, Meninggal</label>
                      <input type="text" class="form-control" value="<?php echo $jenis_sakit; ?>" placeholder="Masukkan jenis sakit" name="jenis_sakit" required>
                    </div>
                    <div class>
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                      <?php if($status == "baru"){ echo '<button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>';?>
                      <?php } else { ?>
                      <a href="<?php echo base_url()."Riwayat_penyakit/riwayat_sakit_keluarga/".$idkk; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                      <?php } ?>
                    </div><!-- /.col -->
                  </form>
                </div><!-- /.item -->

              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
        </div><!-- /.row (main row) -->
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
          "searching": true,
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
