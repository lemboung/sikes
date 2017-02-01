<?php foreach ($family_data as $fd) {
  $idkk = $fd->id_kepala_keluarga;
  $alamat = $fd->alamat;
  $rt = $fd->RT;
  $rw = $fd->RW;
  $kelurahan = $fd->kelurahan;
  $kecamatan = $fd->kecamatan;
  $kota = $fd->kota;
  $status_kes = $fd->status_kes_primer;
  $pembayaran = $fd->pembayaran;
}

if (empty($edit_status)) {
  $id_status_pasien = "";
  $nik = "";
  $anamnesa = "";
  $td = "";
  $rr = "";
  $nadi = "";
  $suhu = "";
  $hasil_pemeriksaan_penunjang = "";
  $diagnosa = "";
  $terapi = "";
} else {
  foreach ($edit_status as $es) {
    $id_status_pasien = $es->id_status_pasien;
    $nik = $es->dk_nik;
    $anamnesa = $es->anamnesa;
    $td = $es->td;
    $rr = $es->rr;
    $nadi = $es->nadi;
    $suhu = $es->suhu;
    $hasil_pemeriksaan_penunjang = $es->hasil_pemeriksaan_penunjang;
    $diagnosa = $es->diagnosa;
    $terapi = $es->terapi;
  }
}



foreach ($pasien_data as $pd) {
  $nama = $pd->nama;
  $bday = new DateTime ($pd->tanggal_lahir);
  $today = new DateTime();
  $age = $today->diff($bday);
  $umur = $age->y." Th";
  $jenis_kelamin = $pd->jenis_kelamin;
  $pekerjaan = $pd->pekerjaan;
}

  $riwayat_sakit = "";
  $alergi_obat = "";

foreach ($health_data as $hd) {
  if (!empty($hd->org_batuk)) {
    $riwayat_sakit =  $riwayat_sakit."batuk, ";
  }
  if (!empty($hd->org_asma)) {
    $riwayat_sakit =  $riwayat_sakit."asma, ";
  }
  if (!empty($hd->masalah_kes)) {
    $riwayat_sakit =  $riwayat_sakit.$hd->masalah_kes.", ";
  }
  if (!empty($hd->penyakit_khusus)) {
    $riwayat_sakit =  $riwayat_sakit.$hd->penyakit_khusus." ";
  }
  $alergi_obat = $hd->alergi_obat;
}

?>
