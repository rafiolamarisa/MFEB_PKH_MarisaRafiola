<?php
$idhapus = $_GET['idhapus'];
$hapusNormalisasi = $koneksi->query("SELECT id_penduduk FROM tbl_penilaian WHERE nilai_id = '$idhapus'")->fetch_assoc();
$pecah = $hapusNormalisasi['id_penduduk'];

$hapus = $koneksi->query("DELETE FROM tbl_normalisasi WHERE id_penduduk='$pecah'");
$hapusRank = $koneksi->query("DELETE FROM tbl_rank WHERE id_penduduk='$pecah'");
$db->HapusPenilaian($idhapus);

echo "
   <script>
   alert('data berhasil di hapus');
   window.location=' ?page=pages/penilaian/index'
   </script>";
