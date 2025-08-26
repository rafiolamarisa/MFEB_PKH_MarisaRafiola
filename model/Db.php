<?php
session_start();
include 'conn.php';

class Db extends conn
{
    //-------------------------------------------------CRUD ADMIN----------------------------------------------------//
    public function tampilDataAdmin()
    {
        $query = $this->ambilData("SELECT * FROM tbl_admin");
        return $query;
    }
    public function ambilSatuId($id)
    {
        $query = $this->ambilData("SELECT * FROM tbl_admin WHERE admin_id = '$id'");
        return $query;
    }
    public function tambahData($data)
    {
        global $koneksi;
        $nama_admin = $data['nama'];
        $tempat     = $data['tempat'];
        $tgllahir   = $data['tgllahir'];
        $notelp     = $data['notelp'];
        $email      = $data['email'];
        $jk         = $data['jk'];
        $username   = $data['username'];
        $password   =  $data['pass'];
        $alamat     = $data['alamat'];
        $foto       = $_FILES['foto']['name'];
        $lokasi     = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "images/admin/" . $foto);


        $query = "INSERT INTO tbl_admin (admin_nama,admin_tempat,admin_lahir,admin_notelp,admin_email,admin_jk,admin_username,admin_password,admin_alamat,admin_foto)
                                                                                VALUES 
                                                                                ('$nama_admin',
                                                                                '$tempat',
                                                                                '$tgllahir',
                                                                                '$notelp',
                                                                                '$email',
                                                                                '$jk',
                                                                                '$username',
                                                                                '$password',
                                                                                '$alamat',
                                                                                '$foto')";

        return $koneksi->query($query);
    }

    public function HapusData($id)
    {
        global $koneksi;
        $data = $koneksi->query("SELECT admin_foto FROM tbl_admin WHERE admin_id = '$id'")->fetch_assoc();
        $gambar = $data['admin_foto'];
        @unlink("images/admin/" . $gambar);
        $query =  "DELETE FROM tbl_admin WHERE admin_id = '$id'";

        return $koneksi->query($query);
    }

    public function editdata($data)
    {

        global $koneksi;
        $id         = $data['admin_id'];
        $nama_admin = $data['admin_nama'];
        $tempat     = $data['admin_tempat'];
        $tgllahir   = $data['admin_tgllahir'];
        $notelp     = $data['admin_notelp'];
        $email      = $data['admin_email'];
        $jk         = $data['jk'];
        $username   = $data['admin_username'];
        $password   = $data['admin_password'];
        $alamat     = $data['admin_alamat'];

        $gambar_lama   = $data['gambar_lama'];

        $foto       = $_FILES['foto']['name'];
        $lokasi     = $_FILES['foto']['tmp_name'];

        if (!empty($lokasi)) {
            @unlink("images/admin/" . $gambar_lama);
            move_uploaded_file($lokasi, "images/admin/" . $foto);
            $query = "UPDATE tbl_admin SET 
            admin_nama     = '$nama_admin',
            admin_tempat     = '$tempat',
            admin_lahir     = '$tgllahir',
            admin_notelp     = '$notelp',
            admin_email     = '$email',
            admin_jk     = '$jk',
            admin_username = '$username',
            admin_password = '$password',
            admin_alamat = '$alamat',
            admin_foto     = '$foto'
            WHERE admin_id = '$id'";

            return $koneksi->query($query);
        } else {
            $query = "UPDATE tbl_admin SET 
            admin_nama     = '$nama_admin',
            admin_tempat     = '$tempat',
            admin_lahir     = '$tgllahir',
            admin_notelp     = '$notelp',
            admin_email     = '$email',
            admin_jk     = '$jk',
            admin_username = '$username',
            admin_password = '$password',
            admin_alamat = '$alamat'
            WHERE admin_id = '$id'";

            return $koneksi->query($query);
        }
    }
    //-------------------------------------------AKHIR DARI CRUD ADMIN---------------------------------------------//

    //-------------------------------------------AKHIR DARI CRUD KRITERIA---------------------------------------------//
    public function tampilDataKriteria()
    {

        $query = $this->ambilData("SELECT * FROM tbl_kriteria");
        return $query;
    }
    public function editKriteria($data)
    {
        global $koneksi;
        $id         = $data['kriteria_id'];
        $nama       = $data['kriteria_nama'];
        $nilai      = $data['nilai_bobot'];

        $query = "UPDATE tbl_kriteria SET 
            kriteria_nama     = '$nama',
            kriteria_bobot = '$nilai'
            WHERE kriteria_id = '$id'";
        return $koneksi->query($query);
    }
    //-------------------------------------------AKHIR DARI CRUD KRITERIA---------------------------------------------//
    //-------------------------------------------AKHIR DARI CRUD PENDUDUK---------------------------------------------//
    public function tampilPdd()
    {
        $query = $this->ambilData("SELECT * FROM tbl_penduduk ORDER BY id_penduduk DESC");
        return $query;
    }
    public function HapusPdd($id)
    {
        global $koneksi;
        $query =  "DELETE FROM tbl_penduduk WHERE id_penduduk = '$id'";
        return $koneksi->query($query);
    }

    public function editPdd($data)
    {
        global $koneksi;
        $id     = $data['id'];
        $nama   = $data['nama'];
        $jk     = $data['jk'];
        $alamat = $data['alamat'];
        $nohp   = $data['nohp'];
        $nik  = $data['nik'];
        return $koneksi->query("UPDATE `tbl_penduduk` SET `nama_penduduk`='$nama',`jk_penduduk`='$jk ',`alamat_penduduk`='$alamat',`nohp_penduduk`='$nohp',`nik`='$nik' WHERE `id_penduduk`='$id'");
    }

    public function tambahPdd($data)
    {
        global $koneksi;
        $input_nama       = $data['input_nama'];
        $input_jk         = $data['input_jk'];
        $input_alamat     = $data['input_alamat'];
        $input_nohp       = $data['input_nohp'];
        $input_nik        = $data['input_nik'];
        $query = "INSERT INTO `tbl_penduduk`(`nama_penduduk`, `jk_penduduk`, `alamat_penduduk`, `nohp_penduduk`, `nik`) VALUES 
                                                                                ('$input_nama',
                                                                                '$input_jk',
                                                                                '$input_alamat',
                                                                                '$input_nohp',
                                                                                '$input_nik')";
        return $koneksi->query($query);
    }
    //-------------------------------------------AKHIR DARI CRUD PENDUDUK---------------------------------------------//
    //-------------------------------------------AKHIR DARI CRUD penilaian---------------------------------------------//
    public function tampilDataPenilaian()
    {
        $query = $this->ambilData("SELECT * FROM tbl_penilaian a JOIN tbl_penduduk b ON a.id_penduduk=b.id_penduduk");
        return $query;
    }

    public function tambahDataPenilaian($data)
    {
        global $koneksi;


        $id_penduduk        = $data['id_penduduk'];
        $ibu_hamil          = $data['ibu_hamil'];
        $anak_dini          = $data['anak_dini'];
        $anak_sd            = $data['anak_sd'];
        $anak_smp           = $data['anak_smp'];
        $anak_sma           = $data['anak_sma'];
        $disabilitas_berat  = $data['disabilitas_berat'];
        $lanjut_usia        = $data['lanjut_usia'];

        $a = $this->convert_nilai($ibu_hamil);
        $b = $this->convert_nilai($anak_dini);
        $c = $this->convert_nilai($anak_sd);
        $d = $this->convert_nilai($anak_smp);
        $e = $this->convert_nilai($anak_sma);
        $f = $this->convert_nilai($disabilitas_berat);
        $g = $this->convert_nilai($lanjut_usia);

        $cek_data = $koneksi->query("SELECT * FROM tbl_penilaian where id_penduduk='$id_penduduk'");
        $row = mysqli_num_rows($cek_data);
        if ($row > 0) {
            return false;
        } else {
            $query = $koneksi->query("INSERT INTO `tbl_penilaian`(`id_penduduk`, `ibu_hamil`, `anak_usia_dini`, `anak_sd`, `anak_smp`, `anak_sma`,`disabilitas_berat`,`lanjut_usia`) VALUES 
            ('$id_penduduk',
            '$ibu_hamil',
            '$anak_dini',
            '$anak_sd',
            '$anak_smp',
            '$anak_sma',
            '$disabilitas_berat',
            '$lanjut_usia'
            )");
            $query = $koneksi->query("INSERT INTO `tbl_normalisasi`(`id_penduduk`, `nilai_ibu_hamil`, `nilai_usia_dini`, `nilai_sd`, `nilai_smp`, `nilai_sma`,`nilai_disabilitas`,`nilai_lanjut_usia`) VALUES
            ('$id_penduduk',
            '$a',
            '$b',
            '$c',
            '$d',
            '$e',
            '$f',
            '$g'
            )");
            return $query;
        }
    }
    public function HapusPenilaian($id)
    {
        global $koneksi;
        $query =  "DELETE FROM tbl_penilaian WHERE nilai_id = '$id'";

        return $koneksi->query($query);
    }

    public function tampilDataNormalisasi()
    {
        $query = $this->ambilData("SELECT * FROM tbl_normalisasi a JOIN tbl_penduduk b ON a.id_penduduk=b.id_penduduk");
        return $query;
    }

    public function ambiljumlahKriteria()
    {
        global $koneksi;
        $data = $koneksi->query("SELECT * FROM tbl_kriteria");
        $hasil = mysqli_num_rows($data);

        return $hasil;
    }





    //-------------------------------------------AKHIR DARI CRUD penilaian---------------------------------------------//
    //-------------------------------------------AKHIR DARI CRUD RANKING---------------------------------------------//
    public function tampilDataRank()
    {
        $query = $this->ambilData("SELECT * FROM tbl_rank a JOIN tbl_penduduk b ON a.id_penduduk=b.id_penduduk ORDER BY nilai_ev DESC ");
        return $query;
    }

    //-------------------------------------------AKHIR DARI CRUD RANKING---------------------------------------------//


    //------------------crud berita----------------------------------------------//
    public function tampilBerita()
    {
        return $this->ambilData("SELECT * FROM tbl_berita");
    }

    public function saveBerita($data)
    {
        global $koneksi;
        $judul = $data['judul'];
        $isi = $data['isi'];
        $tgl  = $data['tgl'];
        $gambar = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "images/berita/" . $gambar);

        return $koneksi->query("INSERT INTO tbl_berita (berita_judul,berita_isi,berita_tgl,berita_gambar) VALUES ('$judul','$isi','$tgl','$gambar')");
    }

    public function editBerita($data)
    {
        global $koneksi;
        $id = $data['id'];
        $judul = $data['judul'];
        $isi = $data['isi'];
        $tgl  = $data['tgl'];
        $gambar_lama  = $data['gambar_lama'];

        $gambar = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($lokasi)) {
            @unlink("images/berita/" . $gambar_lama);
            move_uploaded_file($lokasi, "images/berita/" . $gambar);
            return $koneksi->query("UPDATE tbl_berita SET berita_judul = '$judul',
                                                                berita_isi = '$isi',
                                                                berita_tgl = '$tgl',
                                                                berita_gambar = '$gambar' WHERE 
                                                                berita_id = '$id'");
        } else {
            return $koneksi->query("UPDATE tbl_berita SET 
            berita_judul = '$judul',
            berita_isi = '$isi',
            berita_tgl = '$tgl'
           WHERE 
            berita_id = '$id'");
        }
    }

    public function hapusBerita($id)
    {
        global $koneksi;
        $data = $koneksi->query("SELECT berita_gambar FROM tbl_berita WHERE berita_id = '$id'")->fetch_assoc();
        $gambar = $data['berita_gambar'];
        @unlink("images/berita/" . $gambar);
        return $koneksi->query("DELETE FROM tbl_berita WHERE berita_id = '$id'");
    }

    //-------------------------------------akhir crud berita------------------//
    public function login($data)
    {
        global $koneksi;
        $user = $data['username'];
        $pass  = md5($data['password']);

        $query = "SELECT * FROM tbl_admin WHERE admin_username = '$user' AND admin_password = '$pass'";
        $ambil = $koneksi->query($query);
        $validasi = $ambil->num_rows;
        // var_dump($query);
        // die;

        if ($validasi >= 1) {
            session_start();

            $_SESSION['admin'] = $ambil->fetch_assoc();

            echo "
            <script>
            alert('Selamat Anda Berhasil Login');
            window.location='index.php';
            </script>";
        } else {
            echo " <script>
            alert('Login Gagal Silahkan Coba Lagi ');
            window.location='login.php';
            </script>";
        }
    }
}
