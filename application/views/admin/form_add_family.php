<!DOCTYPE html>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
          <?php if ($status == 'baru') {
            echo "<h1>
              Pendaftaran Keluarga Baru
              <small>Formulir pendaftaran keluarga baru</small>
            </h1>";
          } else {
            echo "<h1>Edit Data Keluarga</h1>";
          }?>

          <?php  if ($status == "edit") {
            $idkk = $this->uri->segment(3);
          } ?>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()."Admin";?>"><i class="fa fa-home"></i> Home</a></li>
            <?php if ($status == 'baru') {
              echo "<li class=\"active\">Pendaftaran Keluarga Baru</li>";
            } else {
              echo "<li><a href=\"".base_url("Data_keluarga/anggota_keluarga/").$idkk."\"><i class=\"fa fa-users\"></i> Anggota Keluarga</a></li>";
              echo "<li class=\"active\">Edit Keluarga</li>";
            }?>
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
                  <h3 class="box-title">Form Data Keluarga</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                if ($status == 'baru') {
                  echo form_open_multipart('Data_keluarga/insert_keluarga');
                } elseif ($status == 'edit') {
                  echo form_open_multipart('Data_keluarga/update_keluarga');
                  echo "<input type='hidden' class='form-control'  value='".$idkk."' name='idkk'>";
                }
                ?>

                  <div class="box-body">
                    <div class="form-group">
                      <label>alamat</label>
                      <input type="text" class="form-control" value="<?php echo $alamat; ?>" placeholder="Masukkan alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control" style="width:100%" name="provinsi" id="provinsi" required>
                        <option selected value="">pilih provinsi</option>
                        <?php 
                        foreach ($prov as $p) {
                          echo "<option value='$p->id'>$p->name</option>";
                        } 
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kota/Kabupaten</label>
                      <select class="form-control" style="width:100%" id="kota" name="kota" required>
                      <option value='0'>--pilih--</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select class="form-control" style="width:100%" id="kecamatan" name="kecamatan" required>
                      <option value='0'>--pilih--</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Desa/Kelurahan</label>
                      <select class="form-control" style="width:100%" id="kelurahan" name="kelurahan"  required>
                      <option value='0'>--pilih--</option>
                      </select>
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
        <b>Information System Research Group Filkom 2016</b>
      </footer>

    <!-- <script src="<?php echo base_url()."style/" ?>js/lokasi.js"></script> -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."style/" ?>js/jquery-2.0.0.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."style/" ?>js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url()."style/" ?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."style/" ?>js/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."style/" ?>js/app.min.js"></script>
    <!-- select2 js -->
    <!-- <script src="<?php echo base_url()."style/" ?>js/select2.full.min.js"></script> -->
    <!-- page script -->
    <script>
      $(function () {
      // $(".select2").select2();
      $.ajaxSetup({
        type:"POST",
        url: "<?php echo base_url('Data_keluarga/select_lokasi') ?>",
        cache: false,
      });

      $("#provinsi").change(function(){
        var value=$(this).val();
        if(value>0){
          $.ajax({
          data:{modul:'kota',id:value},
          success: function(respond){
          $("#kota").html(respond);}
          })
        }
      });

      $("#kota").change(function(){
        var value=$(this).val();
        if(value>0){
          $.ajax({
          data:{modul:'kec',id:value},
          success: function(respond){
          $("#kecamatan").html(respond);},
          error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error get data from ajax');
            }
          })
        }
      });

      $("#kecamatan").change(function(){
        var value=$(this).val();
        if(value>0){
          $.ajax({
          data:{modul:'kelurahan',id:value},
          success: function(respond){
          $("#kelurahan").html(respond);}
          })
        } 
      });
    });  
    </script>
  </body>
</html>
