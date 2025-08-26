<?php
$idhapus = $_GET['idhapus'];

$db->HapusData($idhapus);
echo "
   <script>
   alert('data berhasil di hapus');
   window.location='?page=pages/admin/index'
   </script>";
