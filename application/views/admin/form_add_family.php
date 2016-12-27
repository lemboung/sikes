<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url("/style/image/icon.png") ?>" />
    <title>Sikes Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/" ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/"?>plugins/datatables/dataTables.bootstrap.css">
    <!-- select2 plugins -->
    <link rel="stylesheet" href="<?php echo base_url()."style/"?>css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/"?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/"?>dist/css/skins/_all-skins.min.css">



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
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href=<?php echo base_url()."Admin";?>
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li >
            <li class="active treeview">
                <a href=<?php echo base_url()."Data_keluarga/daftar_keluarga";?>
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

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pendaftaran Keluarga Baru
            <small>Formulir pendaftaran keluarga baru</small>
          </h1>

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/daftar_keluarga";?>"><i class="fa fa-users"></i> Daftar Keluarga</a></li>
            <li class="active">Pendaftaran Keluarga Baru</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-push-3 col-md-6">
              <!-- general form elements -->
              <?php if(empty($family_data)){
                $idkk = '';
                $alamat = '';
                $RT = '';
                $RW = '';
                $kelurahan = '';
                $kecamatan = '';
                $kota = '';
                $pembayaran = '';
              }
              else {
                foreach ($family_data as $fd) {
                  $idkk = $fd->id_kepala_keluarga;
                  $alamat = $fd->alamat;
                  $RT = $fd->RT;
                  $RW = $fd->RW;
                  $kelurahan = $fd->kelurahan;
                  $kecamatan = $fd->kecamatan;
                  $kota = $fd->kota;
                  $pembayaran = $fd->pembayaran;
                }
              } ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Keluarga Baru</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                if ($status == 'baru') {
                  echo form_open_multipart('Data_keluarga/insert_keluarga');
                } elseif ($status == 'edit') {
                  echo form_open_multipart('Data_keluarga/update_keluarga');
                }
                ?>
                <input type="hidden" class="form-control"  value="<?php echo $idkk; ?>" name="idkk">
                  <div class="box-body">
                    <div class="form-group">
                      <label>alamat</label>
                      <input type="text" class="form-control" value="<?php echo $alamat; ?>" placeholder="Masukkan alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                      <label>RT</label>
                      <input type="number" class="form-control"  value="<?php echo $RT; ?>" placeholder="00" name="rt" required>
                    </div>
                    <div class="form-group">
                      <label>RW</label>
                      <input type="number" class="form-control" value="<?php echo $RW; ?>" placeholder="00" name="rw" required>
                    </div>
                    <div class="form-group">
                      <label>Desa/Kelurahan</label>
                      <input type="text" class="form-control"  value="<?php echo $kelurahan; ?>" placeholder="Masukkan Desa/Kelurahan" name="kelurahan" required>
                    </div>
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <input type="text" class="form-control" value="<?php echo $kecamatan; ?>" placeholder="Masukkan Kecamatan" name="kecamatan" required>
                    </div>
                    <div class="form-group">
                      <label>Kota/Kabupaten</label>
                      <input type="text" class="form-control" value="<?php echo $kota; ?>" placeholder="Masukkan Kota/Kabupaten" name="kota" required>
                    </div>
                    <div class="form-group">
                      <label>Pembayaran</label>
                      <input type="text" class="form-control"  value="<?php echo $pembayaran; ?>"placeholder="Masukkan Pembayaran" name="pembayaran" required>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
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
    <script src="<?php echo base_url()."style/admin/" ?>plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
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
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        $(".select2").select2();
      });
    </script>
  </body>
</html>
