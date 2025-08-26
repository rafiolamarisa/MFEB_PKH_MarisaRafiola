<?php
include '../../model/Db.php';
$db = new Db();
date_default_timezone_set("Asia/Bangkok");
function TanggalIndo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return ($result);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>MFEP - PKH</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin.css" rel="stylesheet">


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <style type="text/css">
        #mapid {
            height: 600px;
            /* width: 400px; */
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            /* background-color: #4CAF50; */
            color: black;
        }
    </style>

</head>

<body onload="print()" id="page-top" style="background-color: seashell;">
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <div id="wrapper">
        <div id="content-wrapper">
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
                <tbody>
                    <tr>
                        <td width="20%" align="left" valign="top">
                            <img src="../../images/50kota.png" width="85px" height="100px" style="margin-left: 100px;">
                        </td>
                        <td valign="top" align="center" valign="center">
                            <p style="font-size: 16px;margin-bottom: 3px;">
                                PEMERINTAH KABUPATEN LIMA PULUH KOTA
                            </p>
                            <p style="font-size: 18px;margin-bottom: 3px;">
                                <strong><span>DINAS SOSIAL</span></strong>
                            </p>
                            <p style="color: black; font:smaller;margin-bottom: 3px;">Jalan Soekarno-Hatta No. 87 Payakumbuh Kode Pos 26224
                                <br>
                            <p style="font-size: 14px;margin-bottom: 3px;">Telepon/Fax. 907520 92037 </p>
                            </p>
                        </td>
                        <td width="20%">
                            <img src="../../images/logodinsos.png" width="75px" height="90px" style="margin-right: 100px;">
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr style="margin-top: 3px;height:1px;background-color: black;">
            <hr style="margin-top: -6px;">
            <br>
            <center>
                <h3 class="text-capitalize"> <u>Laporan Data Penduduk Lulus PKH</u> </h3>
            </center>
            <br><br>
            <table id="customers" width="70%" cellspacing="0">
                <thead>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Total Nilai</th>
                    <th>Nilai Preferensi</th>
                    <th>Peringkat</th>
                    <th>Keterangan</th>
                </thead>
                <tbody>
                    <?php
                    $jumlah = $_POST['jml_lulus'];
                    $no = 1;

                    $rank = 1;
                    $prev_rank = $rank;

                    $ambil = $koneksi->query("SELECT * FROM tbl_rank a JOIN tbl_penduduk b ON a.id_penduduk=b.id_penduduk ORDER BY a.nilai_ev DESC LIMIT $jumlah");
                    $numbers = array();
                    $arrlength = array();
                    while ($pecah = $ambil->fetch_array()) {
                        $numbers[] = $pecah['nilai_preferensi'];

                        var_dump($number);
                        if ($no <= $jumlah) {
                            $hasil = 'Lulus';
                        } else {
                            $hasil = 'Tidak Lulus';
                        }
                    ?>
                        <tr>
                            <td align="center"><?= $no++ ?></td>
                            <td><?= $pecah['nik'] ?></td>
                            <td><?= $pecah['nama_penduduk'] ?></td>
                            <td><?= $pecah['nohp_penduduk'] ?></td>
                            <td align="center"><?= $pecah['nilai_ev'] ?></td>
                            <td align="center"><?= $pecah['nilai_preferensi'] ?></td>
                            <td align="center">

                                <?php


                                for ($x = 0; $x < $jumlah; $x++) {
                                    if ($x == 0) {
                                        echo $rank;
                                    } elseif (@$numbers[$x] != @$numbers[$x - 1]) {

                                        $rank++;
                                        $prev_rank = $rank;
                                        echo $rank;

                                        echo '<br>';
                                    } else {
                                        $rank++;
                                        echo $prev_rank;
                                    }
                                }


                                ?>



                            </td>
                            <td align="center"><?= $hasil ?></td>
                        </tr>
                    <?php } ?>


                    <?php

                    $arrlength = count($numbers);
                    $rank = 1;
                    $prev_rank = $rank;

                    for ($x = 0; $x < $arrlength; $x++) {



                        if ($x == 0) {
                            echo $rank;
                        } elseif ($numbers[$x] != $numbers[$x - 1]) {
                            echo '<prev>';
                            print_r('nilai - ' . $numbers[$x]);
                            echo '</prev>';
                            $rank++;
                            $prev_rank = $rank;
                            echo $rank;

                            echo '<br>';
                        } else {
                            $rank++;
                            echo $prev_rank;
                        }
                    }
                    ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <div class="col-6" style="text-align: right; float: right;">
                <br><br>
                <table border="0" align="right">
                    <tr>
                        <td align="center">Kepala Dinas</td>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    </tr>
                    <tr>
                        <td align="center">Padang, <?= TanggalIndo(date("Y-m-d H:i:s")); ?></td>
                    </tr>
                    <tr>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td align="center">
                            <p style="text-align: center;text-decoration: underline;"><strong>Ir. INDRA SURIANI</strong></p>
                            <p style="text-align: center;margin-top: -15px;">NIP. 1968230040643001</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="assets/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Page level plugin JavaScript-->
    <!-- <script src="assets/vendor/chart.js/Chart.min.js"></script> -->
    <script src="../../assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../../assets/js/demo/datatables-demo.js"></script>
    <!-- <script src="assets/js/demo/chart-area-demo.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>



</html>