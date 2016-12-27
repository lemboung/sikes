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

foreach ($economic_data as $ed) {
  $luas = $ed->luas_bangunan_lahan;
  $status_kep = $ed->status_kepemilikan_rumah;
  $daya = $ed->daya_listrik;
  $sumber = $ed->sumber_ekonomi;
  $penopang = $ed->penopang_ekonomi;
}

foreach ($behav_data as $bd) {
  $pel_prev = $bd->pelayanan_preventif_balita;
  $pemeliharaan = $bd->pemeliharaan_kes_keluarga;
  $pel_diri = $bd->pelayanan_pengobatan_diri;
  $jamkes = $bd->jaminan_kesehatan;
  $sumber_minum = $bd->sumber_air_minum;
  if ($bd->spal == 1) {
    $spal = "Ya";
  } else if ($bd->sumber_air_minum == 0){
    $spal = "Tidak";
  }
  if ($bd->kamar_mandi == 1) {
    $km = "Ya";
  } else if ($bd->kamar_mandi == 0){
    $km = "Tidak";
  }
  if ($bd->wc_kloset == 1) {
    $wc = "Ya";
  } else if ($bd->wc_kloset == 0){
    $wc = "Tidak";
  }
  if ($bd->tempat_cuci_sendiri == 1) {
    $tc = "Ya";
  } else if ($bd->tempat_cuci_sendiri == 0){
    $tc = "Tidak";
  }
}

foreach ($health_data as $hd) {
  $tanggal = $hd->tanggal;
  $org_batuk = $hd->org_batuk;
  $org_asma = $hd->org_asma;
  $org_masalah_kes = $hd->org_masalah_kes;
  $masalah_kes = $hd->masalah_kes;
  $org_penyakit_khusus = $hd->org_penyakit_khusus;
  $penyakit_khusus = $hd->penyakit_khusus;
  $mulai_merokok = $hd->mulai_merokok;
  $berhenti_merokok = $hd->berhenti_merokok;
  $jml_rokok = $hd->jml_rokok;
  $jamu = $hd->jamu;
  $jenis_jamu = $hd->jenis_jamu;
  $alkohol = $hd->alkohol;
  $kopi = $hd->kopi;
  $jenis_obat = $hd->jenis_obat;
  if ($hd->minum_dingin == 1) {
    $minum_dingin = "Ya";
  } else if ($hd->tidur_kasur_busa == 0){
    $minum_dingin = "Tidak";
  }
  $pelihara_hewan = $hd->pelihara_hewan;
  $olahraga = $hd->olahraga;
  $jenis_olahraga = $hd->jenis_olahraga;
  if ($hd->olahraga_keluarga == 1) {
    $olahraga_keluarga = "Ya";
  } else if ($hd->tidur_kasur_busa == 0){
    $olahraga_keluarga = "Tidak";
  }
  if ($hd->tidur_kasur_busa == 1) {
    $tidur_kasur_busa = "Ya";
  } else if ($hd->tidur_kasur_busa == 0){
    $tidur_kasur_busa = "Tidak";
  }
  if ($hd->sepeda_motor == 1) {
    $sepeda_motor = "Ya";
  } else if ($hd->sepeda_motor == 0){
    $sepeda_motor = "Tidak";
  }
  $alergi_obat = $hd->alergi_obat;
  $kosmetika_obat_luar = $hd->kosmetika_obat_luar;
}

?>
