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
      <?php include('getDataPasien.php'); ?>
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
                <a href=<?php echo base_url()."Data_keluarga";?>
                  <i class="fa fa-users"></i> <span>Daftar Keluarga</span>
                </a>
            </li>
            <!-- <li class=" treeview">
                <a href=<?php echo base_url()."Admin/daftar_risiko"; ?>
                  <i class="fa fa-book"></i> <span>Daftar Risiko</span>
                </a>
            </li> -->
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

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
