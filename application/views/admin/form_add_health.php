<!DOCTYPE html>
<html>
  <head>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."style/admin/"?>plugins/datatables/dataTables.bootstrap.css">
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
            <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
            <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kesehatan Keluarga</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table  class="table table-bordered table-striped table1">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Mengalami Batuk</th>
                        <th>Mengalami Asma</th>
                        <th>Mengalami Masalah Kes</th>
                        <th>Masalah Kesehatan</th>
                        <th>Mengalami Penyakit Khs</th>
                        <th>Penyakit Khusus</th>
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
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-warning btn-sm"href="<?php echo base_url()."Data_sosial/edit_data_kesehatan/".$idkk."/".$h->id_dsk; ?>"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm"href="<?php echo base_url()."Data_sosial/hapus_data_kesehatan/".$idkk."/".$h->id_dsk; ?>"><i class="fa fa-trash"></i></a>
                          </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

            <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Konsumsi Keluarga</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped table1">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($health as $h) {
                        # code...
                       ?>
                      <tr>
                        <td><?php echo $h->tanggal; ?></td>
                        <td><?php if ($h->mulai_merokok == 0) {
                          echo "-";
                        } else {
                          echo $h->mulai_merokok;
                        }?></td>
                        <td><?php if ($h->berhenti_merokok == 0) {
                          echo "-";
                        } else {
                          echo $h->berhenti_merokok;
                        } ?></td>
                        <td><?php echo $h->jml_rokok; ?></td>
                        <td><?php echo $h->jenis_rokok; ?></td>
                        <td><?php echo $h->jamu; ?></td>
                        <td><?php echo $h->jenis_jamu; ?></td>
                        <td><?php if ($h->alkohol == 0) {
                          echo "tidak";
                        } else {
                          echo "ya";
                        } ?></td>
                        <td><?php echo $h->kopi; ?></td>
                        <td><?php echo $h->jenis_obat; ?></td>
                        <td><?php if ($h->minum_dingin == 0) {
                          echo "tidak";
                        } else {
                          echo "ya";
                        } ?></td>
                        <td width="7%">
                          <div class="btn-group">
                            <a class="btn btn-warning btn-sm"href="<?php echo base_url()."Data_sosial/edit_data_kesehatan/".$idkk."/".$h->id_dsk; ?>"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm"href="<?php echo base_url()."Data_sosial/hapus_data_kesehatan/".$idkk."/".$h->id_dsk; ?>"><i class="fa fa-trash"></i></a>
                          </div>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

            <div class="col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kebiasaan Sehat Keluarga</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="table-end" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
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
                      <?php foreach ($health as $h) {?>
                      <tr>
                        <td><?php echo $h->tanggal; ?></td>
                        <td><?php if ($h->pelihara_hewan == 0) {
                          echo "tidak";
                        } else {
                          echo "ya";
                        } ?></td>
                        <td><?php echo $h->olahraga; ?></td>
                        <td><?php echo $h->jenis_olahraga; ?></td>
                        <td><?php echo $h->olahraga_keluarga; ?></td>
                        <td><?php if ($h->tidur_kasur_busa == 0) {
                          echo "tidak";
                        } else {
                          echo "ya";
                        } ?></td>
                        <td><?php if ($h->sepeda_motor == 0) {
                          echo "tidak";
                        } else {
                          echo "ya";
                        } ?></td>
                        <td><?php echo $h->alergi_obat; ?></td>
                        <td><?php echo $h->kosmetika_obat_luar; ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-warning btn-sm"href="<?php echo base_url()."Data_sosial/edit_data_kesehatan/".$idkk."/".$h->id_dsk; ?>"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm"href="<?php echo base_url()."Data_sosial/hapus_data_kesehatan/".$idkk."/".$h->id_dsk; ?>"><i class="fa fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>


            <?php if (empty($ahealth)) {
              $id_dsk = "";
              $tanggal = "";
              $org_batuk = "";
              $org_asma = "";
              $org_masalah_kes = "";
              $masalah_kes = "";
              $org_penyakit_khusus = "";
              $penyakit_khusus = "";
              $mulai_merokok = "";
              $berhenti_merokok = "";
              $jml_rokok = "";
              $jenis_rokok = "";
              $jamu = "";
              $jenis_jamu = "";
              $alkohol = "";
              $kopi = "";
              $jenis_obat = "";
              $minum_dingin = "";
              $pelihara_hewan = "";
              $olahraga = "";
              $jenis_olahraga = "";
              $olahraga_keluarga = "";
              $tidur_kasur_busa = "";
              $sepeda_motor = "";
              $alergi_obat = "";
              $kosmetika_obat_luar = "";
            } else {
              foreach ($ahealth as $a) {
                $id_dsk = $a->id_dsk;
                $tanggal = $a->tanggal;
                $org_batuk = $a->org_batuk;
                $org_asma = $a->org_asma;
                $org_masalah_kes = $a->org_masalah_kes;
                $masalah_kes = $a->masalah_kes;
                $org_penyakit_khusus = $a->org_penyakit_khusus;
                $penyakit_khusus = $a->penyakit_khusus;
                $mulai_merokok = $a->mulai_merokok;
                $berhenti_merokok = $a->berhenti_merokok;
                $jml_rokok = $a->jml_rokok;
                $jenis_rokok = $a->jenis_rokok;
                $jamu = $a->jamu;
                $jenis_jamu = $a->jenis_jamu;
                $alkohol = $a->alkohol;
                $kopi = $a->kopi;
                $jenis_obat = $a->jenis_obat;
                $minum_dingin = $a->minum_dingin;
                $pelihara_hewan = $a->pelihara_hewan;
                $olahraga = $a->olahraga;
                $jenis_olahraga = $a->jenis_olahraga;
                $olahraga_keluarga = $a->olahraga_keluarga;
                $tidur_kasur_busa = $a->tidur_kasur_busa;
                $sepeda_motor = $a->sepeda_motor;
                $alergi_obat = $a->alergi_obat;
                $kosmetika_obat_luar = $a->kosmetika_obat_luar;
              }
            }?>

            <div class="col-md-12">
              <!-- general form elements -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Data</h3>
                </div><!-- /.box-header -->
                  <!-- form start -->
                  <?php
                  if ($status == 'baru') {
                    echo form_open_multipart('Data_sosial/insert_data_kesehatan');
                  } elseif ($status == 'edit'){
                    echo form_open_multipart('Data_sosial/update_data_kesehatan/');
                  } ?>
                  <input type="hidden" name="idkk" value="<?php echo $idkk; ?>" />
                  <input type="hidden" name="id_dsk" value="<?php echo $id_dsk; ?>" />
                  <div class="col-md-4">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">Form Data Kesehatan keluarga</h4>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Anggota Keluarga yang Mengalami Batuk</label></br>
                          <select class="select2" multiple="multiple" style="width:100%;" data-placeholder="Masukkan Anggota Keluarga"  name="org_batuk[]">
                            <?php foreach ($family as $f) {
                              if (strpos($org_batuk, $f->nama) !== false) {
                                echo "<option value='$f->nama' selected=''>$f->nama</option>";
                              } else {
                                echo "<option value='$f->nama'>$f->nama</option>";
                              }
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Anggota Keluarga yang Mengalami Asma</label></br>
                          <select class="select2" multiple="multiple" style="width:100%;" data-placeholder="Masukkan Anggota Keluarga"  name="org_asma[]">
                            <?php foreach ($family as $f) {
                              if (strpos($org_asma, $f->nama) !== false) {
                                echo "<option value='$f->nama' selected=''>$f->nama</option>";
                              } else {
                                echo "<option value='$f->nama'>$f->nama</option>";
                              }
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Anggota Keluarga yang Mengalami Masalah Kesehatan</label></br>
                          <select class="select2" multiple="multiple" style="width:100%;" data-placeholder="Masukkan Anggota Keluarga"  name="org_masalah[]">
                            <?php foreach ($family as $f) {
                              if (strpos($org_masalah_kes, $f->nama) !== false) {
                                echo "<option value='$f->nama' selected=''>$f->nama</option>";
                              } else {
                                echo "<option value='$f->nama'>$f->nama</option>";
                              }
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Sebutkan Masalah Kesehatan yang Dialami</label>
                          <input type="text" class="form-control" value="<?php echo $masalah_kes ?>" placeholder="Masukkan masalah kesehatan" name="isi_masalah">
                        </div>
                        <div class="form-group">
                          <label>Anggota Keluarga yang Mengalami Penyakit Khusus</label></br>
                          <select class="select2" multiple="multiple" style="width:100%;" data-placeholder="Masukkan Anggota Keluarga"  name="org_khusus[]">
                            <?php foreach ($family as $f) {
                              if (strpos($org_penyakit_khusus, $f->nama) !== false  ) {
                                echo "<option value='$f->nama' selected=''>$f->nama</option>";
                              } else {
                                echo "<option value='$f->nama'>$f->nama</option>";
                              }
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Sebutkan Penyakit Khusus yang Dialami</label>
                          <input type="text" class="form-control" value="<?php echo $penyakit_khusus ?>" placeholder="Masukkan Penyakit Khusus" name="isi_khusus">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">Form Data Konsumsi keluarga</h4>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Mulai Merokok</label></br>
                          <input type="number" class="form-control" value="<?php echo $mulai_merokok?>" placeholder="Masukkan tahun mulai merokok" name="mulai_merokok">
                        </div>
                        <div class="form-group">
                          <label>Berhenti Merokok</label></br>
                          <input type="number" class="form-control" value="<?php echo $berhenti_merokok?>" placeholder="Masukkan tahun berhenti merokok" name="berhenti_merokok">
                        </div>
                        <div class="form-group">
                          <label>Jumlah Rokok dalam 1 hari</label></br>
                          <input type="number" class="form-control" value="<?php echo $jml_rokok ?>" placeholder="jumlah rokok (batang)" name="jml_rokok">
                        </div>
                        <div class="form-group">
                          <label>Jenis Rokok</label></br>
                          <select class="select2" style="width:40%;" data-placeholder="pilih "  name="jenis_rokok">
                            <?php if (strpos($jenis_rokok, '') !== false) {
                              echo "<option value='' selected=''></option>";
                            } else {
                              echo "<option value=''></option>";
                            }
                            if (strpos($jenis_rokok, 'kretek') !== false) {
                              echo "<option value='kretek' selected=''>kretek</option>";
                            } else {
                              echo "<option value='kretek'>kretek</option>";
                            }
                            if (strpos($jenis_rokok, 'filter') !== false) {
                              echo "<option value='filter' selected=''>filter</option>";
                            } else {
                              echo "<option value='filter'>filter</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Jumlah jamu dalam 1 minggu</label></br>
                          <input type="number" class="form-control" style="width:40%" value="<?php echo $jamu ?>" placeholder="gelas" name="jamu">
                        </div>
                        <div class="form-group">
                          <label>Jenis jamu</label></br>
                          <input type="text" class="form-control" value="<?php echo $jenis_jamu ?>" placeholder="jenis jamu" name="jenis_jamu">
                        </div>
                        <div class="form-group">
                          <label>Minum Alkohol</label></br>
                          <select class="form-control" style="width:40%;" data-placeholder="jawaban"  name="alkohol">
                            <?php if ($alkohol == 0) {
                              echo "<option value='0' selected=''>tidak</option>";
                              echo "<option value='1' >ya</option>";
                            } else {
                              echo "<option value='0' >tidak</option>";
                              echo "<option value='1' selected=''>ya</option>";
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Jumlah kopi dalam 1 minggu</label></br>
                          <input type="number" class="form-control" style="width:40%" value="<?php echo $kopi ?>" placeholder="gelas" name="kopi">
                        </div>
                        <div class="form-group">
                          <label>Jenis obat-obatan yang dikonsumsi</label></br>
                          <input type="text" class="form-control" value="<?php echo $jenis_obat ?>" placeholder="jenis obat-obatan" name="jenis_obat">
                        </div>
                        <div class="form-group">
                          <label>Minum dingin</label></br>
                          <select class="form-control" style="width:40%;" data-placeholder="jawaban"  name="minum_dingin">
                            <?php if ($minum_dingin == 0) {
                              echo "<option value='0' selected=''>tidak</option>";
                              echo "<option value='1' >ya</option>";
                            } else {
                              echo "<option value='0' >tidak</option>";
                              echo "<option value='1' selected=''>ya</option>";
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">Form Data Kebiasaan Sehat keluarga</h4>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Hewan yang dipelihara</label></br>
                          <input type="text" class="form-control" value="<?php echo $pelihara_hewan ?>" placeholder="hewan peliharaan" name="peilhara_hewan">
                        </div>
                        <div class="form-group">
                          <label>Jumlah Olahraga dalam 1 minggu</label></br>
                          <input type="number" class="form-control" style="width:40%" value="<?php echo $olahraga ?>" placeholder="jumlah" name="olahraga">
                        </div>
                        <div class="form-group">
                          <label>Jenis Olahraga</label></br>
                          <input type="text" class="form-control" style="width:40%" value="<?php echo $jenis_olahraga ?>" placeholder="jumlah" name="jenis_olahraga">
                        </div>
                        <div class="form-group">
                          <label>Olahraga Keluarga</label></br>
                          <select class="form-control" style="width:40%;" name="olahraga_keluarga">
                            <?php if ($olahraga_keluarga == 0) {
                              echo "<option value='0' selected=''>tidak</option>";
                              echo "<option value='1' >ya</option>";
                            } else {
                              echo "<option value='0' >tidak</option>";
                              echo "<option value='1' selected=''>ya</option>";
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Tidur kasur busa</label></br>
                          <select class="form-control" style="width:40%;"  name="tidur_kasur_busa">
                            <?php if ($tidur_kasur_busa == 0) {
                              echo "<option value='0' selected=''>tidak</option>";
                              echo "<option value='1' >ya</option>";
                            } else {
                              echo "<option value='0' >tidak</option>";
                              echo "<option value='1' selected=''>ya</option>";
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Naik Sepeda motor</label></br>
                          <select class="form-control" style="width:40%;" data-placeholder="jawaban"  name="sepeda_motor">
                            <?php if ($sepeda_motor == 0) {
                              echo "<option value='0' selected=''>tidak</option>";
                              echo "<option value='1' >ya</option>";
                            } else {
                              echo "<option value='0' >tidak</option>";
                              echo "<option value='1' selected=''>ya</option>";
                            } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Alergi Obat</label></br>
                          <input type="text" class="form-control" value="<?php echo $alergi_obat ?>" placeholder="Masukkan Alergi obat" name="alergi_obat">
                        </div>
                        <div class="form-group">
                          <label>Kosmetika dan obat luar yang digunakan</label></br>
                          <input type="text" class="form-control" value="<?php echo $kosmetika_obat_luar ?>" placeholder="Masukkan kosmetika/obat luar" name="kosmetika_obat_luar">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="box-footer pull-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <?php if($status == "baru"){ echo '<button type="reset" class="btn btn-warning">Batal</button>';?>
                        <?php } else { ?>
                        <a href="<?php echo base_url()."Data_sosial/kelola_data_kesehatan/".$idkk; ?>" class="btn btn-warning">Kembali</a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>


                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <b>Information System Research Group Filkom 2016</b>
      </footer>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."style/admin/" ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."style/admin/" ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url()."style/admin/" ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."style/admin/" ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."style/admin/" ?>dist/js/app.min.js"></script>
    <!-- select2 js -->
    <script src="<?php echo base_url()."style/" ?>js/select2.full.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $(".table1").DataTable({
          "paging": false,
          "searching": false,
          "autoWidth": true,
          "scrollX": true
        });
        $('#table-end').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "scrollX": true

        });
        $(".select2").select2();
      });
    </script>
  </body>
</html>
