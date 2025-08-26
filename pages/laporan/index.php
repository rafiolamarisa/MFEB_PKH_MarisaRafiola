<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb bg-white">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Laporan</li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <i class="fas fa-users"></i>
                        Laporan Data Lulus
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form action="pages/laporan/cetak.php" target="_blank" method="post">
                                <div class="form-group">
                                    <label class="font-weight-bold">Jumlah Lulus</label>
                                    <input type="number" placeholder="Jumlah lulus..." name="jml_lulus" id="jml_lulus" class="form-control" required>
                                </div>
                                <button type="submit" name="cari" class="btn btn-success"><i class="fas fa-print"></i> Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <i class="fas fa-user"></i>
                        Laporan Data Penduduk
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form action="pages/laporan/cetak_pdd.php" target="_blank" method="post">
                                <br><br><br>
                                <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> Cetak</button>
                            </form>
                            <!-- <form action="pages/laporan/cetak.php" target="_blank" method="post">
                                
                                <button type="submit" name="cari" class="btn btn-success"><i class="fas fa-print"></i> Cetak</button>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>