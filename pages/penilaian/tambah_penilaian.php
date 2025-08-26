<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $hasil = $db->tambahDataPenilaian($_POST);
    if ($hasil == true) {
        echo "     <script>alert('Data Berhasil Disimpan')</script>";
        echo "     <script>window.location='?page=pages/penilaian/index'</script>";
    } else {
        echo "     <script>alert('Data Penduduk Sudah Ada')</script>";
        echo "     <script>window.location='?page=pages/penilaian/index'</script>";
    }
}

?>
<style>
    label {
        font-family: sans-serif;
        font-size: 15px;
    }
</style>
<div class="container d-flex justify-content-center">
    <div class="card mb-3  " style="width: 70%; ">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Input Data Penilaian
        </div>
        <div class="card-body pl-5">
            <form action="" method="POST" style="width: 90%;" enctype="multipart/form-data">
                <h4 class="text-center" style="font-family: fantasy;">SILAHKAN ISI FORM BERIKUT</h4>
                <br>
                <div class="form-group">
                    <label class="font-weight-bold">Nama Penduduk</label>
                    <select name="id_penduduk" id="id_penduduk" class="form-control" required>
                        <option value="">--Silahkan Pilih--</option>
                        <?php
                        $penduduk = $db->tampilPdd();
                        foreach ($penduduk as $no => $pecah) :
                        ?>
                            <option value="<?= $pecah['id_penduduk'] ?>"><?= $pecah['nama_penduduk'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Terdapat Ibu Hamil</label>
                    <select name="ibu_hamil" id="ibu_hamil" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="ada">Ada</option>
                        <option value="tidak ada">Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Terdapat Anak Usia Dini</label>
                    <select name="anak_dini" id="anak_dini" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="ada">Ada</option>
                        <option value="tidak ada">Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Terdapat Anak SD</label>
                    <select name="anak_sd" id="anak_sd" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="ada">Ada</option>
                        <option value="tidak ada">Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Terdapat Anak SMP</label>
                    <select name="anak_smp" id="anak_smp" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="ada">Ada</option>
                        <option value="tidak ada">Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Terdapat Anak SMA</label>
                    <select name="anak_sma" id="anak_sma" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="ada">Ada</option>
                        <option value="tidak ada">Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Terdapat Disabilitas Berat</label>
                    <select name="disabilitas_berat" id="disabilitas_berat" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="ada">Ada</option>
                        <option value="tidak ada">Tidak Ada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Terdapat Lanjut Usia</label>
                    <select name="lanjut_usia" id="lanjut_usia" class="form-control" required>
                        <option value="">-- Silahkan Pilih --</option>
                        <option value="ada">Ada</option>
                        <option value="tidak ada">Tidak Ada</option>
                    </select>
                </div>
                <div class="text-center">
                    <button name="save" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>