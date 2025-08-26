<?php
include "../../model/conn.php";

$id = $_POST['id'];

$data = $koneksi->query("SELECT * FROM tbl_penduduk WHERE id_penduduk = '$id'")->fetch_assoc();
echo json_encode($data);
