<!DOCTYPE html>
<html>
  <head>
    <?php include("head.php"); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/" ?>plugins/datatables/dataTables.bootstrap.css">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

          <?php include("header.php"); ?>

      <?php include('getDataFamily.php'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Keluarga
            <small>Kelola Data dan Anggota Keluarga</small>
          </h1>

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url("Data_keluarga"); ?>"><i class="fa fa-home"></i> Daftar Keluarga</a></li>
            <li class="active"> Data dan Anggota keluarga</li>
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
                  <h3 class="box-title">Data Keluarga</h3>
                  <br><br>
                  <table id="example" class="table table-bordered table-striped">
                    <tbody>
                      <tr>
                        <th>Alamat</th> <td>  <?php echo $alamat; ?></td>
                      </tr>
                      <tr>
                        <th>RT</th> <td> <?php echo $rt; ?></td>
                      </tr>
                      <tr>
                        <th>RW</th> <td> <?php echo $rw; ?></td>
                      </tr>
                      <tr>
                        <th>Desa/Kelurahan</th> <td> <?php echo $kelurahan; ?></td>
                      </tr>
                      <tr>
                        <th>Kecamatan</th> <td> <?php echo $kecamatan; ?></td>
                      </tr>
                      <tr>
                        <th>Kota/Kabupaten</th> <td> <?php echo $kota; ?></td>
                      </tr>
                      <tr>
                        <th>Status Kes Primer</th> <td> <?php echo $status_kes; ?></td>
                      </tr>
                      <tr>
                        <th>Pembayaran</th> <td> <?php echo $pembayaran; ?></td>
                      </tr>
                    </tbody>
                  </table><br>
                  <a href="<?php echo base_url("")."Data_keluarga/edit_data/".$idkk; ?>"><button type="submit" class="btn btn-warning"> Edit Data Keluarga</button></a></br></br>
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Anggota Keluarga</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Pekerjaan</th>
                        <th>Hubungan Keluarga</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($family as $f) {
                        # code...
                       ?>
                      <tr>
                        <td><?php echo $f->nama; ?></td>
                        <td><?php $bday = new DateTime ($f->tanggal_lahir);
                                  $today = new DateTime();
                                  $umur = $today->diff($bday);
                                  echo $umur->y." Th"; ?></td>
                        <td><?php echo $f->pekerjaan; ?></td>
                        <td><?php echo $f->hubungan_keluarga; ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url()."Data_keluarga/edit_anggota_keluarga/".$idkk."/".$f->nik; ?>"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url()."Data_keluarga/edit_anggota_keluarga/".$idkk."/".$f->nik; ?>"><i class="fa fa-trash"></i></a>
                            <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="<?php echo base_url()."Riwayat_pekerjaan/tabel/".$f->nik;  ?>">Riwayat Pekerjaan</a></li>
                            </ul>
                          </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <tr>
                          <th>Nama</th>
                          <th>Umur</th>
                          <th>Pekerjaan</th>
                          <th>Hubungan Keluarga</th>
                          <th>Action</th>
                        </tr>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row">

          <!-- Left col -->
          <div class="col-md-6">
            <!-- Chat box -->
            <?php if(empty($person)){
              $nik = '';
              $nama = '';
              $tgl_lahir = '';
              $pekerjaan = '';
              $hub_kel = '';
              $status_kawin = '';
              $umur_kawin = '';
            }
            else {
              foreach ($person as $p) {
                $nik = $p->nik;
                $nama = $p->nama;
                $tgl_lahir = $p->tanggal_lahir;
                $pekerjaan = $p->pekerjaan;
                $hub_kel = $p->hubungan_keluarga;
                $status_kawin = $p->status_kawin;
                $umur_kawin = $p->umur_kawin;
              }
            } ?>

            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Form Tambah/Edit Anggota Keluarga</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <?php if ($status == 'baru') {
                    echo "<form action=\"".base_url()."Data_keluarga/insert_anggota_keluarga\" method=\"post\">";
                  } elseif ($status == 'edit') {
                    echo "<form action=\"".base_url()."Data_keluarga/update_anggota_keluarga/".$nik."\" method=\"post\">";
                  }?>

                    <div class="form-group">
                      <label>NIK</label>
                      <input type="number" class="form-control" value="<?php echo $nik; ?>" placeholder="Masukkan NIK" name="nik" required>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" value="<?php echo $nama; ?>" placeholder="Masukkan Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                      <label>Tangal Lahir</label>
                      <input type="date" class="form-control" value="<?php echo $tgl_lahir; ?>"  name="tgl" required>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" value="<?php echo $jenis_kelamin; ?>" name="jenis_kelamin">
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" value="<?php echo $pekerjaan; ?>" placeholder="Masukkan Pekerjaan" name="pekerjaan" required>
                    </div>
                    <div class="form-group">
                      <label>Hubungan Keluarga</label>
                      <select class="form-control" value="<?php echo $hub_kel; ?>" placeholder="Hubungan Keluarga" name="hubungan_keluarga">
                        <option value="Kepala keluarga">Kepala keluarga</option>
                        <option value="Istri">Istri</option>
                        <option value="Anak">Anak</option>
                        <option value="Anak Angkat">Anak Angkat</option>
                        <option value="Saudara">Saudara</option>
                        <option value="lain">lain</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status Kawin</label>
                      <select class="form-control" value="<?php echo $status_kawin; ?>" placeholder="Status Kawin" name="status_kawin">
                        <option value="0">Belum Menikah</option>
                        <option value="1">Menikah</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Umur Kawin Pertama</label>
                      <input type="number" class="form-control" value="<?php echo $umur_kawin; ?>"  name="umur_kawin">
                    </div>
                    <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                    <div class>
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                      <?php if($status == "baru"){ echo '<button type="reset" class="btn btn-warning btn-block btn-flat">Batal</button>';?>
                      <?php } else { ?>
                      <a href="<?php echo base_url()."Data_keluarga/anggota_keluarga/".$idkk; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
                      <?php } ?>
                    </div><!-- /.col -->
                  </form>
                </div><!-- /.item -->
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </div><!-- /.Left col -->
          <div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Kelola Data Keluarga</h3>
              </div>
              <div class="box-body">
                <div class="btn-group">
                  <input type="button" class="btn btn-primary" onclick="parent.location='<?php echo base_url("")."Data_sosial/tambah_data_ekonomi/".$idkk; ?>'" value=" + Data Ekonomi">
                  <input type="button" class="btn btn-warning" onclick="parent.location='<?php echo base_url("")."Data_sosial/edit_data_ekonomi/".$idkk; ?>'" value="Edit Data Ekonomi">
                </div>
                <br></br>
                <div class="btn-group">
                  <input type="button" class="btn btn-primary" onclick="parent.location='<?php echo base_url("")."Data_sosial/tambah_data_perilaku/".$idkk; ?>'" value=" + Data Perilaku Kesehatan">
                  <input type="button" class="btn btn-warning" onclick="parent.location='<?php echo base_url("")."Data_sosial/edit_data_perilaku/".$idkk; ?>'" value="Edit Data Perilaku Kesehatan">
                </div>
                <br></br>
                <a href="<?php echo base_url("")."Data_sosial/kelola_data_kesehatan/".$idkk; ?>"><button type="submit" class="btn btn-primary">kelola Data Sosial Kesehatan</button></a>
                <br></br>
                <a href="<?php echo base_url("")."Riwayat_penyakit/riwayat_sakit_keluarga/".$idkk; ?>"><button type="submit" class="btn btn-primary ">kelola Riwayat Penyakit Keluarga</button></a>
                <br></br>
                <a href="<?php echo base_url("")."Klasifikasi/hitung/".$idkk; ?>"><button type="submit" class="btn btn-success ">hitung Klasifikasi</button></a>
                <br></br>
              </div>
            </div>
          </div>
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
      });
    </script>
  </body>
</html>
