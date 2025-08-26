<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Perhitungan</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Kriteria Bobot
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary" align="center">
                            <th width="10%">No</th>
                            <th>Nama Kriteria</th>
                            <th>Nilai Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $kriteria = $db->tampilDataKriteria();
                        foreach ($kriteria as $no => $pecah) :
                            @$jumlah += $pecah['kriteria_bobot'];
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['kriteria_nama'] ?></td>
                                <td class="text-center"><?= $pecah['kriteria_bobot'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" align="right"> <b>Jumlah</b> </td>
                            <td class="text-center"> <b><?= @$jumlah ?></b> </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Penilaian
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary" align="center">
                            <th>No</th>
                            <th>Nama Penduduk</th>
                            <th>Ibu Hamil</th>
                            <th>Anak Usia Dini</th>
                            <th>Anak SD</th>
                            <th>Anak SMP</th>
                            <th>Anak SMA</th>
                            <th>Disabilitas Berat</th>
                            <th>Lanjut Usia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $penilaian = $db->tampilDataPenilaian();
                        foreach ($penilaian as $no => $pecah) :
                        ?>
                            <tr align="center">
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['nama_penduduk'] ?></td>
                                <td><?= $pecah['ibu_hamil'] ?></td>
                                <td><?= $pecah['anak_usia_dini'] ?></td>
                                <td><?= $pecah['anak_sd'] ?></td>
                                <td><?= $pecah['anak_smp'] ?></td>
                                <td><?= $pecah['anak_sma'] ?></td>
                                <td><?= $pecah['disabilitas_berat'] ?> </td>
                                <td><?= $pecah['lanjut_usia'] ?> </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Normalisasi Alternatif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary" align="center">
                            <th>No</th>
                            <th>Nama Penduduk</th>
                            <th>Ibu Hamil</th>
                            <th>Anak Usia Dini</th>
                            <th>Anak SD</th>
                            <th>Anak SMP</th>
                            <th>Anak SMA</th>
                            <th>Disabilitas Berat</th>
                            <th>Lanjut Usia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $penilaian = $db->tampilDataNormalisasi();
                        foreach ($penilaian as $no => $pecah) :
                        ?>
                            <tr align="center">
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['nama_penduduk'] ?></td>
                                <td><?= $pecah['nilai_ibu_hamil'] ?></td>
                                <td><?= $pecah['nilai_usia_dini'] ?></td>
                                <td><?= $pecah['nilai_sd'] ?></td>
                                <td><?= $pecah['nilai_smp'] ?></td>
                                <td><?= $pecah['nilai_sma'] ?></td>
                                <td><?= $pecah['nilai_disabilitas'] ?> </td>
                                <td><?= $pecah['nilai_lanjut_usia'] ?> </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Hasil Perhitungan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-primary" align="center">
                            <th>No</th>
                            <th>Nama Penduduk</th>
                            <th>Ibu Hamil</th>
                            <th>Anak Usia Dini</th>
                            <th>Anak SD</th>
                            <th>Anak SMP</th>
                            <th>Anak SMA</th>
                            <th>Disabilitas Berat</th>
                            <th>Lanjut Usia</th>
                            <th>Total Nilai</th>
                            <th>Nilai Preferensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $dataKriteria   = $db->tampilDataKriteria();
                        $penilaian      = $db->tampilDataNormalisasi();
                        $totalkriteria  = $db->ambiljumlahKriteria();
                        // var_dump($totalkriteria);
                        foreach ($penilaian as $no => $pecah) :
                            foreach ($dataKriteria as $key => $pecah2) {
                                $datak[] = $pecah2;
                            }

                            $juml = ($pecah['nilai_ibu_hamil']      * $datak[0]['kriteria_bobot']) +
                                ($pecah['nilai_usia_dini']          * $datak[1]['kriteria_bobot']) +
                                ($pecah['nilai_sd']                 * $datak[2]['kriteria_bobot']) +
                                ($pecah['nilai_smp']                * $datak[3]['kriteria_bobot']) +
                                ($pecah['nilai_sma']                * $datak[4]['kriteria_bobot']) +
                                ($pecah['nilai_disabilitas']        * $datak[5]['kriteria_bobot']) +
                                ($pecah['nilai_lanjut_usia']        * $datak[6]['kriteria_bobot']);

                            $total = $juml / $totalkriteria;
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['nama_penduduk'] ?></td>
                                <td class="text-center"><?= number_format($pecah['nilai_ibu_hamil']       * $datak[0]['kriteria_bobot'], 2)  ?></td>
                                <td class="text-center"><?= number_format($pecah['nilai_usia_dini']       * $datak[1]['kriteria_bobot'], 2)  ?></td>
                                <td class="text-center"><?= number_format($pecah['nilai_sd']              * $datak[2]['kriteria_bobot'], 2) ?></td>
                                <td class="text-center"><?= number_format($pecah['nilai_smp']             * $datak[3]['kriteria_bobot'], 2)  ?></td>
                                <td class="text-center"><?= number_format($pecah['nilai_sma']             * $datak[4]['kriteria_bobot'], 2)  ?></td>
                                <td class="text-center"><?= number_format($pecah['nilai_disabilitas']     * $datak[5]['kriteria_bobot'], 2)  ?></td>
                                <td class="text-center"><?= number_format($pecah['nilai_lanjut_usia']     * $datak[6]['kriteria_bobot'], 2)  ?></td>
                                <td class="text-center"><?= number_format($juml, 2) ?></td>
                                <!-- <td class="text-center"><?= substr($total, 0, 5)  ?></td> -->
                                <td class="text-center"><?= number_format($total, 2)  ?></td>
                            </tr>
                            <form action="" method="post">
                                <input type="hidden" name="id_pdd[]" value="<?= $pecah['id_penduduk'] ?>">
                                <input type="hidden" name="total[]" value="<?= $juml ?>">
                                <input type="hidden" name="preferensi[]" value="<?= $total ?>">

                            <?php endforeach;
                            ?>


                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary mb-2" type="submit" name="simpan">Lihat Rangking</button>
    </div>
    </form>
    <?php
    if (isset($_POST['simpan'])) {
        $id = $_POST['id_pdd'];
        $total = $_POST['total'];
        $preferensi = $_POST['preferensi'];
        foreach ($id as $key => $value) {
            $koneksi->query("DELETE FROM tbl_rank WHERE id_penduduk = '$id[$key]'");
            $koneksi->query("INSERT INTO `tbl_rank`(`id_penduduk`, `nilai_preferensi`, `nilai_ev`) VALUES ('$id[$key]','$preferensi[$key]','$total[$key]')");
        } ?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Ranking
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-primary text-white" align="center">
                                <th>No</th>
                                <th>Nama penduduk</th>
                                <th>Total Nilai</th>
                                <th>Nilai Preferensi</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rank = $db->tampilDataRank();
                            $no = 1;
                            foreach ($rank as $no => $pecah) :
                            ?>
                                <tr>
                                    <td><?= ++$no ?></td>
                                    <td><?= $pecah['nama_penduduk'] ?></td>
                                    <td class="text-center"><?= $pecah['nilai_ev'] ?></td>
                                    <td class="text-center"><?= substr($pecah['nilai_preferensi'], 0, 5)  ?></td>
                                    <td class="text-center"><?= $no++ ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php }
    ?>
</div>