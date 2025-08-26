<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Penilaian</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Penilaian
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" style="margin-top: -10px; " href="?page=pages/penilaian/tambah_penilaian"><i class="fa fa-plus"></i> Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama Penduduk</th>
                            <th>Ibu Hamil</th>
                            <th>Anak Usia Dini</th>
                            <th>Anak SD</th>
                            <th>Anak SMP</th>
                            <th>Anak SMA</th>
                            <th>Disabilitas Berat</th>
                            <th>Lanjut Usia</th>
                            <th width="13%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $penilaian = $db->tampilDataPenilaian();
                        foreach ($penilaian as $no => $pecah) :

                            // <img src="images/check.png" alt="" width="7%">
                        ?>
                            <tr align="center">
                                <td><?= ++$no ?></td>
                                <td><?= ucwords($pecah['nama_penduduk']) ?></td>
                                <td><?= ucwords($pecah['ibu_hamil']) ?> </td>
                                <td><?= ucwords($pecah['anak_usia_dini']) ?></td>
                                <td><?= ucwords($pecah['anak_sd']) ?></td>
                                <td><?= ucwords($pecah['anak_smp']) ?></td>
                                <td><?= ucwords($pecah['anak_sma']) ?></td>
                                <td><?= ucwords($pecah['disabilitas_berat']) ?></td>
                                <td><?= ucwords($pecah['lanjut_usia']) ?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="?page=pages/penilaian/hapusnilai&idhapus=<?= $pecah['nilai_id']  ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>