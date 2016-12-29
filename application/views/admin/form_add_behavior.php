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
                <a href=<?php echo base_url()."/daftar_risiko"; ?>
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
            Pendataan Perilaku Kesehatan Keluarga
          </h1>

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/daftar_keluarga";?>"><i class="fa fa-users"></i> Daftar Keluarga</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/anggota_keluarga/".$idkk;?>"><i class="fa fa-users"></i> Anggota Keluarga</a></li>
            <li class="active">Pendataan Perilaku Kesehatan Keluarga</li>
          </ol>
        </section>

        <?php if (empty($behavior_data)) {
          $idkk = "";
          $jamkes = "";
          $prev_balita = "";
          $pemeliharaan = "";
          $pengobatan_diri = "";
          $sumber_air = "";
          $spal = "";
          $wc = "";
          $km = "";
          $tc = "";
        } else {
          foreach ($behavior_data as $bd) {
            $idkk = $bd->dkk_id_kepala_keluarga;
            $jamkes = $bd->jaminan_kesehatan;
            $prev_balita = $bd->pelayanan_preventif_balita;
            $pemeliharaan = $bd->pemeliharaan_kes_keluarga;
            $pengobatan_diri = $bd->pelayanan_pengobatan_diri;
            $sam = $bd->sumber_air_minum;
            $spal = $bd->spal;
            $wc = $bd->wc_kloset;
            $km = $bd->kamar_mandi;
            $tc = $bd->tempat_cuci_sendiri;
          }
        }?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-push-3 col-md-6">
              <!-- general form elements -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Data Perilaku Kesehatan Keluarga</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                if ($status == "baru") {
                  echo form_open_multipart('Data_sosial/insert_data_perilaku');
                } elseif ($status == "edit") {
                  echo form_open_multipart('Data_sosial/update_data_perilaku');
                }
                ?>
                  <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                  <div class="box-body">
                    <div class="form-group">
                      <label>Jaminan Kesehatan</label>
                      <input type="text" class="form-control" value="<?php echo $jamkes ?>" style="width:50%;" placeholder="Masukkan Jaminan Kesehatan" style="width:50%;" name="jaminan_kesehatan" required>
                    </div>
                    <div class="form-group">
                      <label>Pelayanan Preventif Bayi / Balita</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih layanan"  name="pelayanan_prev_balita">
                        <?php
                          if ($prev_balita == "Dokter Praktek Umum") {
                            echo "<option value='Dokter Praktek Umum' selected=''>Dokter Praktek Umum</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($prev_balita == "Puskesmas") {
                            echo "<option value='Puskesmas' selected=''>Puskesmas</option>";
                          }else {
                            echo "<option value='Puskesmas'>Puskesmas</option>";
                          }
                          if ($prev_balita == "Perawat/Bidan") {
                            echo "<option value='Perawat/Bidan' selected=''>Perawat/Bidan</option>";
                          }else {
                            echo "<option value='Perawat/Bidan'>Perawat/Bidan</option>";
                          }
                          if ($prev_balita == "Rumah Sakit Spesialis") {
                            echo "<option value='Rumah Sakit Spesialis' selected=''>Rumah Sakit Spesialis</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($prev_balita == "lain") {
                            echo "<option value='Dlain' selected=''>lain</option>";
                          }else {
                            echo "<option value='lain'>lain</option>";
                          }
                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pemeliharaan Kesehatan Keluarga</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih layanan"  name="pemeliharaan_kes_keluarga">
                        <?php
                          if ($pemeliharaan == "Dokter Praktek Umum") {
                            echo "<option value='Dokter Praktek Umum' selected=''>Dokter Praktek Umum</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($pemeliharaan == "Puskesmas") {
                            echo "<option value='Puskesmas' selected=''>Puskesmas</option>";
                          }else {
                            echo "<option value='Puskesmas'>Puskesmas</option>";
                          }
                          if ($pemeliharaan == "Perawat/Bidan") {
                            echo "<option value='Perawat/Bidan' selected=''>Perawat/Bidan</option>";
                          }else {
                            echo "<option value='Perawat/Bidan'>Perawat/Bidan</option>";
                          }
                          if ($pemeliharaan == "Rumah Sakit Spesialis") {
                            echo "<option value='Rumah Sakit Spesialis' selected=''>Rumah Sakit Spesialis</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($pemeliharaan == "lain") {
                            echo "<option value='Dlain' selected=''>lain</option>";
                          }else {
                            echo "<option value='lain'>lain</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pelayanan Pengobatan Diri Sendiri</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih layanan"  name="pelayanan_pengobatan_diri">
                        <?php
                          if ($pengobatan_diri == "Dokter Praktek Umum") {
                            echo "<option value='Dokter Praktek Umum' selected=''>Dokter Praktek Umum</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($pengobatan_diri == "Puskesmas") {
                            echo "<option value='Puskesmas' selected=''>Puskesmas</option>";
                          }else {
                            echo "<option value='Puskesmas'>Puskesmas</option>";
                          }
                          if ($pengobatan_diri == "Perawat/Bidan") {
                            echo "<option value='Perawat/Bidan' selected=''>Perawat/Bidan</option>";
                          }else {
                            echo "<option value='Perawat/Bidan'>Perawat/Bidan</option>";
                          }
                          if ($pengobatan_diri == "Rumah Sakit Spesialis") {
                            echo "<option value='Rumah Sakit Spesialis' selected=''>Rumah Sakit Spesialis</option>";
                          }else {
                            echo "<option value='Dokter Praktek Umum'>Dokter Praktek Umum</option>";
                          }
                          if ($pengobatan_diri == "lain") {
                            echo "<option value='Dlain' selected=''>lain</option>";
                          }else {
                            echo "<option value='lain'>lain</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Sumber Air Minum</label></br>
                      <select class="select2" multiple="multiple" style="width:50%;" data-placeholder="pilih sumber Air Minum"  name="sumber_air_minum[]">
                        <?php
                          if (strpos($sam, "PDAM") !== false) {
                            echo "<option value='PDAM' selected=''>PDAM</option>";
                          } else {
                            echo "<option value='PDAM'>PDAM</option>";
                          }
                          if (strpos($sam, "Sumur Gali") !== false) {
                            echo "<option value='Sumur Gali' selected=''>Sumur Gali</option>";
                          } else {
                            echo "<option value='Sumur Gali'>Sumur Gali</option>";
                          }
                          if (strpos($sam, "Sumur Pompa") !== false) {
                            echo "<option value='Sumur Pompa' selected=''>Sumur Pompa</option>";
                          } else {
                            echo "<option value='Sumur Pompa'>Sumur Pompa</option>";
                          }
                          if (strpos($sam, "Sungai") !== false) {
                            echo "<option value='Sungai' selected=''>Sungai</option>";
                          } else {
                            echo "<option value='Sungai'>Sungai</option>";
                          }
                          if (strpos($sam, "Galon Kemasan") !== false) {
                            echo "<option value='Galon Kemasan' selected=''>Galon Kemasan</option>";
                          } else {
                            echo "<option value='Galon Kemasan'>Galon Kemasan</option>";
                          }
                          if (strpos($sam, "Galon Isi Ulang") !== false) {
                            echo "<option value='Galon Isi Ulang' selected=''>Galon Isi Ulang</option>";
                          } else {
                            echo "<option value='Galon Isi Ulang'>Galon Isi Ulang</option>";
                          }
                          if (strpos($sam, "Lain") !== false) {
                            echo "<option value='Lain' selected=''>Lain</option>";
                          } else {
                            echo "<option value='Lain'>Lain</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Saluran Pembuangan Air Limbah</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih tipe saluran"  name="spal">
                        <?php if ($spal == "Saluran Limbah Tertutup") {
                          echo "<option value='Saluran Limbah Tertutup' selected=''>Saluran Limbah Tertutup</option>";
                        } else {
                          echo "<option value='Saluran Limbah Tertutup'>Saluran Limbah Tertutup</option>";
                        }
                        if ($spal == "Saluran Limbah Terbuka") {
                          echo "<option value='Saluran Limbah Terbuka' selected=''>Saluran Limbah Terbuka</option>";
                        } else {
                          echo "<option value='Saluran Limbah Terbuka'>Saluran Limbah Terbuka</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>WC Kloset</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih "  name="wc_kloset">
                        <?php
                          if ($wc === 1) {
                            echo "<option value='1' selected=''>Ya</option>";
                          }else {
                            echo "<option value='1'>Ya</option>";
                          }
                          if ($wc === 2) {
                            echo "<option value='2' selected=''>Tidak</option>";
                          }else {
                            echo "<option value='2'>Tidak</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kamar Mandi</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih "  name="kamar_mandi">
                        <?php
                          if ($km === 1) {
                            echo "<option value='1' selected=''>Ya</option>";
                          } else {
                            echo "<option value='1'>Ya</option>";
                          }
                          if ($km === 2) {
                            echo "<option value='2' selected=''>Tidak</option>";
                          } else {
                            echo "<option value='2'>Tidak</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tempat Cuci Tersendiri</label></br>
                      <select class="select2" style="width:50%;" data-placeholder="pilih "  name="tempat_cuci_tersendiri">
                        <?php
                          if ($tc === 1) {
                            echo "<option value='1' selected=''>Ya</option>";
                          } else {
                            echo "<option value='1'>Ya</option>";
                          }
                          if ($tc === 2) {
                            echo "<option value='2' selected=''>Tidak</option>";
                          } else {
                            echo "<option value='2'>Tidak</option>";
                          }
                        ?>
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
        <b>Information System Research Group Filkom 2016</b>
      </footer>

      <!-- Control Sidebar -->
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
