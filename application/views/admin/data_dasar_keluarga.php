<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url("/style/image/icon.png") ?>" />
    <title>SIKES Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/" ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/" ?>plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/" ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/" ?>dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url("")."admin"; ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><center><b>S</b></center></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIKES</b> Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url()."style/admin/" ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Sikes Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url()."style/admin/" ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      SIKES
                      <small>Admin</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo base_url()."Login/logout"; ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url()."style/admin/" ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>user fktp</p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU NAVIGASI</li>
            <li class="treeview">
              <a href=<?php echo base_url()."Admin/dashboard";?>
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li >
            <li class="active treeview">
                <a href=<?php echo base_url()."Admin/daftar_keluarga";?>
                  <i class="fa fa-users"></i> <span>Daftar Keluarga</span>
                </a>
            </li>
            <li class=" treeview">
                <a href=<?php echo base_url()."Admin/daftar_risiko"; ?>
                  <i class="fa fa-book"></i> <span>Daftar Risiko</span>
                </a>
            </li>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <?php include('getDataFamily.php'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Keluarga
            <small>Kelola Data Keluarga</small>
          </h1>

          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"> Data Keluarga</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
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
                <a href="<?php echo base_url("")."Admin/edit_data_keluarga/".$idkk; ?>"><button type="submit" class="btn btn-warning"> Edit Data Keluarga</button></a></br></br>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Ekonomi</h3>
                <br><br>
                <table id="example" class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                      <th>Luas Bangunan / lahan</th> <td>  <?php echo $luas; ?></td>
                    </tr>
                    <tr>
                      <th>Status Kepemilikan Rumah</th> <td> <?php echo $status_kep; ?></td>
                    </tr>
                    <tr>
                      <th>Daya Listrik</th> <td> <?php echo $daya; ?></td>
                    </tr>
                    <tr>
                      <th>Sumber Ekonomi</th> <td> <?php echo $sumber; ?></td>
                    </tr>
                    <tr>
                      <th>Penopang Ekonomi</th> <td> <?php echo $penopang; ?></td>
                    </tr>
                  </tbody>
                </table><br>
                <a href="<?php echo base_url("")."Admin/tambah_data_ekonomi/".$idkk; ?>"><button type="submit" class="btn btn-primary"> + Data Ekonomi Keluarga</button></a>
                <a href="<?php echo base_url("")."Admin/edit_data_ekonomi/".$idkk; ?>"><button type="submit" class="btn btn-warning"> Edit Data Ekonomi Keluarga</button></a></br></br>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Kesehatan Keluarga</h3>
                <br><br>
                <table id="example" class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                      <th>Tanggal Pemeriksaan</th> <td>  <?php echo $tanggal; ?></td>
                    </tr>
                    <tr>
                      <th>Keluarga yang mengalami batuk</th> <td> <?php echo $org_batuk; ?></td>
                    </tr>
                    <tr>
                      <th>Keluarga yang mengalami asma</th> <td> <?php echo $org_asma; ?></td>
                    </tr>
                    <tr>
                      <th>Keluarga yang mengalami masalah kes</th> <td> <?php echo $org_masalah_kes; ?></td>
                    </tr>
                    <tr>
                      <th>Masalah kesehatan</th> <td> <?php echo $masalah_kes; ?></td>
                    </tr>
                    <tr>
                      <th>Keluarga yang mengalami penyakit khusus</th> <td> <?php echo $org_penyakit_khusus; ?></td>
                    </tr>
                    <tr>
                      <th>Penyakit khusus</th> <td> <?php echo $penyakit_khusus; ?></td>
                    </tr>
                    <tr>
                      <th>Mulai merokok</th> <td> <?php echo $mulai_merokok; ?></td>
                    </tr>
                    <tr>
                      <th>Berhenti merokok</th> <td> <?php echo $berhenti_merokok; ?></td>
                    </tr>
                    <tr>
                      <th>Jumlah rokok</th> <td> <?php echo $jml_rokok; ?></td>
                    </tr>
                    <tr>
                      <th>Konsumsi jamu per minggu</th> <td> <?php echo $jamu; ?></td>
                    </tr>
                    <tr>
                      <th>Jenis jamu</th> <td> <?php echo $jenis_jamu; ?></td>
                    </tr>
                    <tr>
                      <th>Konsumsi alkohol</th> <td> <?php echo $alkohol; ?></td>
                    </tr>
                    <tr>
                      <th>Konsumsi kopi per minggu</th> <td> <?php echo $kopi; ?></td>
                    </tr>
                    <tr>
                      <th>Jenis Obat-obatan yang dikonsumsi</th> <td> <?php echo $jenis_obat; ?></td>
                    </tr>
                    <tr>
                      <th>Pelihara hewan</th> <td> <?php echo $pelihara_hewan; ?></td>
                    </tr>
                    <tr>
                      <th>Frekuensi olahraga per minggu</th> <td> <?php echo $olahraga; ?></td>
                    </tr>
                    <tr>
                      <th>Jenis olahraga</th> <td> <?php echo $jenis_olahraga; ?></td>
                    </tr>
                    <tr>
                      <th>Olahraga bersama keluarga</th> <td> <?php echo $olahraga_keluarga; ?></td>
                    </tr>
                    <tr>
                      <th>Tidur kasur busa</th> <td> <?php echo $tidur_kasur_busa; ?></td>
                    </tr>
                    <tr>
                      <th>Terbiasa menggunakan sepeda motor</th> <td> <?php echo $sepeda_motor; ?></td>
                    </tr>
                    <tr>
                      <th>Alergi obat</th> <td> <?php echo $alergi_obat; ?></td>
                    </tr>
                    <tr>
                      <th>Kosmetika/obat luar yang digunakan</th> <td> <?php echo $kosmetika_obat_luar; ?></td>
                    </tr>
                  </tbody>
                </table><br>
                <a href="<?php echo base_url("")."Admin/tambah_data_kesehatan/".$idkk; ?>"><button type="submit" class="btn btn-primary"> + Data Sosial Kesehatan</button></a>
                <a href="<?php echo base_url("")."Admin/riwayat_data_kesehatan/".$idkk; ?>"><button type="submit" class="btn btn-primary"> Riwayat Data Sosial Kesehatan</button></a></br></br>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Data Perilaku Kesehatan</h3>
                <br><br>
                <table id="example" class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                      <th>Pelayanan Preventif Balita</th> <td>  <?php echo $pel_prev; ?></td>
                    </tr>
                    <tr>
                      <th>Pemeliharaan Kes Keluarga</th> <td> <?php echo $pemeliharaan; ?></td>
                    </tr>
                    <tr>
                      <th>Pelayanan Pengobatan Diri</th> <td> <?php echo $pel_diri; ?></td>
                    </tr>
                    <tr>
                      <th>Jaminan Kesehatan</th> <td> <?php echo $jamkes; ?></td>
                    </tr>
                    <tr>
                      <th>Sumber Air Minum</th> <td> <?php echo $sumber_minum; ?></td>
                    </tr>
                    <tr>
                      <th>Saluran Pembuangan Air Limbah</th> <td> <?php echo $spal; ?></td>
                    </tr>
                    <tr>
                      <th>Kamar Mandi</th> <td> <?php echo $km; ?></td>
                    </tr>
                    <tr>
                      <th>WC kloset</th> <td> <?php echo $wc; ?></td>
                    </tr>
                    <tr>
                      <th>Tempat cuci tersendiri</th> <td> <?php echo $tc; ?></td>
                    </tr>
                  </tbody>
                </table><br>
                <a href="<?php echo base_url("")."Admin/tambah_data_Perilaku/".$idkk; ?>"><button type="submit" class="btn btn-primary"> + Data Perilaku Kesehatan</button></a>
                <a href="<?php echo base_url("")."Admin/edit_data_perilaku/".$idkk; ?>"><button type="submit" class="btn btn-warning"> Edit Data Perilaku Kesehatan</button></a></br></br>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Anggota Keluarga</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
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
                            <button type="button" class="btn btn-danger">Action</button>
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="<?php echo base_url()."Admin/edit_anggota_keluarga/".$idkk."/".$f->nik; ?>">edit</a></li>
                              <li><a href="<?php echo base_url()."Admin/update_pasien/".$f->nik;  ?>">update data diri</a></li>
                              <li><a href="<?php echo base_url()."Admin/deleteBlog/".$f->nik;  ?>">update risiko</a></li>
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
          <section class="col-lg-6">
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
                  <form action="<?php echo base_url(); ?>Admin/insert_anggota_keluarga" method="post">
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
                      <label>Pekerjaan</label>
                      <input type="text" class="form-control" value="<?php echo $pekerjaan; ?>" placeholder="Masukkan Pekerjaan" name="pekerjaan" required>
                    </div>
                    <div class="form-group">
                      <label>Hubungan Keluarga</label>
                      <input type="text" class="form-control" value="<?php echo $hub_kel; ?>" placeholder="Hubungan Keluarga" name="hubungan_keluarga" required>
                    </div>
                    <div class="form-group">
                      <label>Status Kawin</label>
                      <input type="text" class="form-control" value="<?php echo $status_kawin; ?>" placeholder="Status Kawin" name="status_kawin" required>
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
                      <a href="<?php echo base_url()."admin/anggota_keluarga/".$idkk; ?>" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
