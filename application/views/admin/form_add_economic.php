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
          <span class="logo-mini"><center><b>G</b></center></span>
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
            Pendataan Ekonomi Keluarga
          </h1>

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/daftar_keluarga";?>"><i class="fa fa-users"></i> Daftar Keluarga</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/anggota_keluarga/".$idkk;?>"><i class="fa fa-users"></i> Anggota Keluarga</a></li>
            <li class="active">Pendataan Ekonomi Keluarga</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-push-3 col-md-6">
              <!-- general form elements -->
              <?php if (empty($economic_data)) {
                  $luas = "";
                  $status_kep = "";
                  $daya = "";
                  $sumber = "";
                  $penopang = "";
              } else {
                foreach ($economic_data as $ed) {
                  $luas = $ed->luas_bangunan_lahan;
                  $status_kep = $ed->status_kepemilikan_rumah;
                  $daya = $ed->daya_listrik;
                  $sumber = $ed->sumber_ekonomi;
                  $penopang = $ed->penopang_ekonomi;
                }
              }?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Data Ekonomi keluarga<?php echo $idkk; ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                if ($status == "baru") {
                  echo form_open_multipart('Data_sosial/insert_data_ekonomi');
                } elseif ($status == "edit") {
                  echo form_open_multipart('Data_sosial/update_data_ekonomi');
                }
                ?>
                  <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                  <div class="box-body">
                    <div class="form-group">
                      <label>luas bangunan / lahan</label>
                      <input type="text" class="form-control" value="<?php echo $luas; ?>" placeholder="Masukkan luas bangunan" style="width:50%;" name="luas_bangunan_lahan" required>
                    </div>
                    <div class="form-group">
                      <label>Status Kepemilikan</label></br>
                      <select class="select2" style="width:50%;" value="<?php echo $status_kep; ?>" data-placeholder="pilih kepemilikan"  name="status_kepemilikan">
                          <option value='Milik Sendiri'>Milik Sendiri</option>";
                          <option value='Milik Orang tua'>Milik Orang tua</option>";
                          <option value='Sewa'>Sewa</option>";
                          <option value='Milik Kerabat'>Milik Kerabat</option>";
                          <option value='lain'>lain</option>";
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Daya Listrik</label></br>
                      <select class="select2" value="<?php echo $daya; ?>" style="width:50%;" data-placeholder="pilih daya listrik"  name="daya_listrik">
                          <option value='450 VA'>450 VA</option>";
                          <option value='900 VA'>900 VA</option>";
                          <option value='1300 VA'>1300 VA</option>";
                          <option value='2200 VA'>2200 VA</option>";
                          <option value='> 2200 VA'>> 2200 VA</option>";
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Sumber Ekonomi</label></br>
                      <select class="select2" value="<?php echo $sumber; ?>" id="sourceValues" style="width:50%;" multiple="multiple"  data-placeholder="pilih sumber ekonomi"  name="sumber_ekonomi[]">
                          <option id="sourceValues" value='Pegawai'>Pegawai</option>";
                          <option id="sourceValues" value='Wirausaha'>Wirausaha</option>";
                          <option value='Bantuan Keluarga'>Bantuan Keluarga</option>";
                          <option value='Lain'>Lain</option>";
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Penopang Ekonomi</label></br>
                      <select class="select2" value="<?php echo $penopang; ?>" style="width:50%;" multiple="multiple"  data-placeholder="pilih penopang ekonomi"  name="penopang_ekonomi[]">
                          <option value='Suami'>Suami</option>";
                          <option value='Istri'>Istri</option>";
                          <option value='Anak'>Anak</option>";
                          <option value='lain'>lain</option>";
                      </select>
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
        var selectedValues = $("#sourceValues").val().split(',');
        $(".select2").val(selectedValues).trigger("change");
      });

    </script>
  </body>
</html>
