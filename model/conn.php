<?php

$koneksi = new mysqli('localhost', 'root', '', 'mfep_pkh');

class conn
{
    function ambilData($query)
    {
        global $koneksi;

        $ambil = mysqli_query($koneksi, $query);
        $hasil = [];

        while ($pecah = mysqli_fetch_assoc($ambil)) {
            $hasil[] = $pecah;
        }

        return $hasil;
    }

    public function convert_nilai($nilai)
    {
        if ($nilai == 'ada') {
            $hasil_nilai = 10;
        } else {
            $hasil_nilai = 0;
        }
        return $hasil_nilai;
    }
}
