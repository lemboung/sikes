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

// foreach ($status_data as $sd) {
//   $nik = $sd->dk_nik;
//   $tanggal = $sd->tanggal;
//   $anamnesa = $sd->anamnesa;
//   $td = $sd->td;
//   $rr = $sd->rr;
//   $nadi = $sd->nadi;
//   $suhu = $sd->suhu;
//   $hasil_pemeriksaan_penunjang = $sd->hasil_pemeriksaan_penunjang;
//   $diagnosa = $sd->diagnosa;
//   $terapi = $sd->terapi;
//   $paraf = $sd->paraf;
// }

foreach ($pasien_data as $pd) {
  $nama = $pd->nama;
  $bday = new DateTime ($pd->tanggal_lahir);
  $today = new DateTime();
  $age = $today->diff($bday);
  $umur = $age->y." Th";
  $jenis_kelamin = $pd->jenis_kelamin;
  $pekerjaan = $pd->pekerjaan;
}

foreach ($health_data as $hd) {
  $riwayat_sakit = "";
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
