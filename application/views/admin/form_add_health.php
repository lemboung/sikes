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
            Pendataan Kesehatan Holistik
            <small>pendataan kesehatan menyeluruh</small>
          </h1>

          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/daftar_keluarga";?>"><i class="fa fa-users"></i> Daftar Keluarga</a></li>
            <li><a href="<?php echo base_url()."Data_keluarga/anggota_keluarga/".$idkk;?>"><i class="fa fa-users"></i> Anggota Keluarga</a></li>
            <li class="active">Pendataan Kesehatan Holistik</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kesehatan Keluarga</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Mengalami Batuk</th>
                        <th>Mengalami Asma</th>
                        <th>Mengalami Masalah Kes</th>
                        <th>Masalah Kesehatan</th>
                        <th>Mengalami Penyakit Khs</th>
                        <th>Penyakit Khusus</th>
                        <th>Mulai Merokok</th>
                        <th>Berhenti Merokok</th>
                        <th>Jumlah Rokok 1 H</th>
                        <th>Jenis Rokok</th>
                        <th>Jumlah Jamu 1 M</th>
                        <th>Jenis Jamu</th>
                        <th>Alkohol</th>
                        <th>Jumlah Kopi 1 M</th>
                        <th>Jenis Obat-obatan</th>
                        <th>Minum Dingin</th>
                        <th>Pelihara Hewan</th>
                        <th>Jumlah Olahraga 1 M</th>
                        <th>Jenis Olahraga</th>
                        <th>Olahraga Keluarga</th>
                        <th>Kasur Busa</th>
                        <th>Naik Sepeda Motor</th>
                        <th>Alergi Obat</th>
                        <th>Kosmetika</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($health as $h) {
                        # code...
                       ?>
                      <tr>
                        <td><?php echo $h->tanggal; ?></td>
                        <td><?php echo $h->org_batuk; ?></td>
                        <td><?php echo $h->org_asma; ?></td>
                        <td><?php echo $h->org_masalah_kes; ?></td>
                        <td><?php echo $h->masalah_kes; ?></td>
                        <td><?php echo $h->org_penyakit_khusus; ?></td>
                        <td><?php echo $h->penyakit_khusus; ?></td>
                        <td><?php echo $h->mulai_merokok; ?></td>
                        <td><?php echo $h->berhenti_merokok; ?></td>
                        <td><?php echo $h->jml_rokok; ?></td>
                        <td><?php echo $h->jenis_rokok; ?></td>
                        <td><?php echo $h->jamu; ?></td>
                        <td><?php echo $h->jenis_jamu; ?></td>
                        <td><?php echo $h->alkohol; ?></td>
                        <td><?php echo $h->kopi; ?></td>
                        <td><?php echo $h->jenis_obat; ?></td>
                        <td><?php echo $h->minum_dingin; ?></td>
                        <td><?php echo $h->pelihara_hewan; ?></td>
                        <td><?php echo $h->olahraga; ?></td>
                        <td><?php echo $h->jenis_olahraga; ?></td>
                        <td><?php echo $h->olahraga_keluarga; ?></td>
                        <td><?php echo $h->tidur_kasur_busa; ?></td>
                        <td><?php echo $h->sepeda_motor; ?></td>
                        <td><?php echo $h->alergi_obat; ?></td>
                        <td><?php echo $h->kosmetika_obat_luar; ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-warning btn-sm"href="<?php echo base_url()."Data_sosial/edit_data_kesehatan/".$idkk; ?>"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm"href="<?php echo base_url()."Data_sosial/hapus_data_kesehatan/".$idkk; ?>"><i class="fa fa-trash"></i></a>
                          </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Data Kesehatan keluarga</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open_multipart('Data_sosial/insert_data_kesehatan');?>
                  <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                  <div class="box-body">
                    <div class="form-group">
                      <label>Anggota Keluarga yang Mengalami Batuk</label></br>
                      <select class="select2" multiple="multiple" style="width:100%;" data-placeholder="Masukkan Anggota Keluarga"  name="org_batuk[]">
                        <?php foreach ($family as $f) {
                          echo "<option value='$f->nama'>$f->nama</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Anggota Keluarga yang Mengalami Asma</label></br>
                      <select class="select2" multiple="multiple" style="width:100%;" data-placeholder="Masukkan Anggota Keluarga"  name="org_asma[]">
                        <?php foreach ($family as $f) {
                          echo "<option value='$f->nama'>$f->nama</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Anggota Keluarga yang Mengalami Masalah Kesehatan</label></br>
                      <select class="select2" multiple="multiple" style="width:100%;" data-placeholder="Masukkan Anggota Keluarga"  name="org_masalah[]">
                        <?php foreach ($family as $f) {
                          echo "<option value='$f->nama'>$f->nama</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Sebutkan Masalah Kesehatan yang Dialami</label>
                      <input type="text" class="form-control" placeholder="Masukkan masalah kesehatan" name="isi_masalah">
                    </div>
                    <div class="form-group">
                      <label>Anggota Keluarga yang Mengalami Penyakit Khusus</label></br>
                      <select class="select2" multiple="multiple" style="width:100%;" data-placeholder="Masukkan Anggota Keluarga"  name="org_khusus[]">
                        <?php foreach ($family as $f) {
                          echo "<option value='$f->nama'>$f->nama</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Sebutkan Penyakit Khusus yang Dialami</label>
                      <input type="text" class="form-control" placeholder="Masukkan Penyakit Khusus" name="isi_khusus">
                    </div>
                    <div class="form-group">
                      <label>Mulai Merokok</label></br>
                      <select class="select2" style="width:40%;" data-placeholder="Tahun"  name="mulai_merokok">
                        <option value=''>0</option>
                        <?php for ($i=1940; $i < 2016; $i++) {
                          echo "<option value='$i'>$i</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Berhenti Merokok</label></br>
                      <select class="select2" style="width:40%;" data-placeholder="Tahun"  name="berhenti_merokok">
                        <option value=''>0</option>
                        <?php for ($i=1940; $i < 2016; $i++) {
                          echo "<option value='$i'>$i</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Rokok dalam 1 hari</label></br>
                      <select class="select2" style="width:40%;" data-placeholder="pilih "  name="jumlah_rokok">
                        <option value=''>0</option>
                        <option value='1 batang'>< 1 batang</option>;
                        <option value='1-5 batang'>1-6 batang</option>;
                        <option value='5 batang - 1 bungkus'>7-12 batang</option>;
                        <option value='> 1 bungkus'>> 1 bungkus</option>;
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jenis Rokok</label></br>
                      <select class="select2" style="width:40%;" data-placeholder="pilih "  name="jenis_rokok">
                        <option value=''></option>
                        <option value='kretek'>kretek</option>;
                        <option value='filter'>filter</option>;
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jumlah jamu dalam 1 minggu</label></br>
                      <input type="number" class="form-control" style="width:40%" placeholder="gelas" name="jamu">
                    </div>
                    <div class="form-group">
                      <label>Jenis jamu</label></br>
                      <input type="text" class="form-control" placeholder="jenis jamu" name="jenis_jamu">
                    </div>
                    <div class="form-group">
                      <label>Minum Alkohol</label></br>
                      <select class="form-control" style="width:40%;" data-placeholder="jawaban"  name="alkohol">
                        <option value='0'>tidak</option>;
                        <option value='1'>Ya</option>;
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jumlah kopi dalam 1 minggu</label></br>
                      <input type="number" class="form-control" style="width:40%" placeholder="gelas" name="kopi">
                    </div>
                    <div class="form-group">
                      <label>Jenis obat-obatan yang dikonsumsi</label></br>
                      <input type="text" class="form-control" placeholder="jenis obat-obatan" name="jenis_obat">
                    </div>
                    <div class="form-group">
                      <label>Minum dingin</label></br>
                      <select class="form-control" style="width:40%;" data-placeholder="jawaban"  name="minum_dingin">
                        <option value='0'>tidak</option>;
                        <option value='1'>Ya</option>;
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Hewan yang dipelihara</label></br>
                      <input type="text" class="form-control" placeholder="hewan peliharaan" name="peilhara_hewan">
                    </div>
                    <div class="form-group">
                      <label>Jumlah Olahraga dalam 1 minggu</label></br>
                      <input type="number" class="form-control" style="width:40%" placeholder="jumlah" name="olahraga">
                    </div>
                    <div class="form-group">
                      <label>Jenis Olahraga</label></br>
                      <input type="text" class="form-control" style="width:40%" placeholder="jumlah" name="jenis_olahraga">
                    </div>
                    <div class="form-group">
                      <label>Olahraga Keluarga</label></br>
                      <select class="form-control" style="width:40%;" name="olahraga_keluarga">
                        <option value='0'>tidak</option>;
                        <option value='1'>Ya</option>;
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tidur kasur busa</label></br>
                      <select class="form-control" style="width:40%;"  name="tidur_kasur_busa">
                        <option value='0'>tidak</option>;
                        <option value='1'>Ya</option>;
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Naik Sepeda motor</label></br>
                      <select class="form-control" style="width:40%;" data-placeholder="jawaban"  name="sepeda_motor">
                        <option value='0'>tidak</option>;
                        <option value='1'>Ya</option>;
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Alergi Obat</label></br>
                      <input type="text" class="form-control" placeholder="Masukkan Alergi obat" name="alergi_obat">
                    </div>
                    <div class="form-group">
                      <label>Kosmetika dan obat luar yang digunakan</label></br>
                      <input type="text" class="form-control" placeholder="Masukkan kosmetika/obat luar" name="kosmetika_obat_luar">
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
          "scrollX": true

        });
        $(".select2").select2();
      });
    </script>
  </body>
</html>
