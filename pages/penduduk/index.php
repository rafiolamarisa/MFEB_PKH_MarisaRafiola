<H1>Marisa Rafiola</H1>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Penduduk</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Penduduk
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" style="margin-top: -10px; " href="#"><i class="fa fa-plus"></i> Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pdd = $db->tampilPdd();
                        //var_dump($pdd);
                        foreach ($pdd as $no => $pecah) :
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['nik'] ?></td>
                                <td><?= $pecah['nama_penduduk'] ?></td>
                                <td><?= $pecah['jk_penduduk'] ?></td>
                                <td><?= $pecah['alamat_penduduk'] ?></td>
                                <td><?= $pecah['nohp_penduduk'] ?></td>
                                <td align="center">
                                    <button type="button" onclick="tampilModal('<?= $pecah['id_penduduk'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <a class="btn btn-danger btn-sm" href="?page=pages/penduduk/hapuspenduduk&id=<?= $pecah['id_penduduk']  ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                if (isset($_POST['save'])) {
                    $db->tambahPdd($_POST);
                    echo "     <script>alert('data berhasil disimpan')</script>";
                    echo "     <script>window.location='?page=pages/penduduk/index'</script>";
                }
                ?>
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data" id="form_tambah_pdd">
                        <div class="form-group">
                            <label class="font-weight-bold">NIK</label>
                            <input type="number" name="input_nik" id="input_nik" class="form-control" placeholder="Masukan NIK..." required />
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Penduduk</label>
                            <input type="text" name="input_nama" id="input_nama" class="form-control" placeholder="Masukan nama..." required />
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Kelamin</label>
                            <select name="input_jk" id="input_jk" class="form-control" required>
                                <option value="">--Silahkan Pilih--</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <textarea name="input_alamat" id="input_alamat" cols="30" rows="5" class="form-control" placeholder="Masukan alamat..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">No HP</label>
                            <input type="number" name="input_nohp" id="input_nohp" class="form-control" placeholder="Masukan nohp" required>
                        </div>

                        <button name="save" type="submit" class="btn btn-primary btn-block mb-2">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_edit_pdd" method="POST" enctype="multipart/form-data">
                    <?php if (isset($_POST['edit'])) {
                        $db->editPdd($_POST);
                        echo "     <script>alert('data berhasil di edit')</script>";
                        echo "<meta http-equiv='refresh' content='0;url=?page=pages/penduduk/index'>";
                    } ?>
                    <input type="hidden" id="id" name="id" class="form-control">
                    <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <input type="text" name="nik" id="nik" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">

                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>

                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">No HP</label>
                        <input type="number" name="nohp" id="nohp" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script script src="assets/jquery-validation-1.19.5/dist/jquery.validate.min.js">
</script>
<script>
    $("#form_tambah_pdd").validate({
        rules: {
            input_nik: {
                required: true,
                number: true,
                maxlength: 16,
                minlength: 16

            },
            input_nama: {
                required: true,
                maxlength: 15,
            },
            input_jk: 'required',
            input_alamat: 'required',
            input_nohp: {
                required: true,
                number: true,
                maxlength: 12,
            },
        },
        messages: {
            input_nik: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>NIK Wajib diisi</span>",
                number: "<span style='color:red;font-size:12px;font-style:italic'>Format harus angka</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>NIK maksimal sebanyak 16 karakter</span>",
                minlength: "<span style='color:red;font-size:12px;font-style:italic'>NIK minimal sebanyak 16 karakter</span>",
            },
            input_nama: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Nama penduduk Wajib diisi</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Nama maksimal sebanyak 15 karakter</span>",

            },
            input_jk: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Jenis kelamin Wajib diisi</span>",
            },
            input_alamat: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Alamat Wajib diisi</span>",
            },
            input_nohp: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>No Hp wajib diisi</span>",
                number: "<span style='color:red;font-size:12px;font-style:italic'>Format harus angka</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Nohp maksimal sebanyak 12 karakter</span>",
            },
        },
        errorElement: "span",
    })


    $("#form_edit_pdd").validate({
        rules: {
            nik: {
                required: true,
                number: true,
                maxlength: 16,
                minlength: 16

            },
            nama: {
                required: true,
                maxlength: 15,
            },
            jk: 'required',
            alamat: 'required',
            nohp: {
                required: true,
                number: true,
                maxlength: 12,
            },
        },
        messages: {
            nik: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>NIK Wajib diisi</span>",
                number: "<span style='color:red;font-size:12px;font-style:italic'>Format harus angka</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>NIK maksimal sebanyak 16 karakter</span>",
                minlength: "<span style='color:red;font-size:12px;font-style:italic'>NIK minimal sebanyak 16 karakter</span>",
            },
            nama: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Nama penduduk Wajib diisi</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Nama maksimal sebanyak 15 karakter</span>",
            },
            jk: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Jenis kelamin Wajib diisi</span>",
            },
            alamat: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Alamat Wajib diisi</span>",
            },
            nohp: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>No Hp wajib diisi</span>",
                number: "<span style='color:red;font-size:12px;font-style:italic'>Format harus angka</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Nohp maksimal sebanyak 12 karakter</span>",
            },
        },
        errorElement: "span",
    })

    function tampilModal(id) {
        $.ajax({
            url: 'pages/penduduk/tampilEdit.php',
            type: 'POST',
            data: {
                'id': id
            },
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                $('#id').val(data.id_penduduk)
                $('#nama').val(data.nama_penduduk)
                $('#jk').val(data.jk_penduduk)
                $('#alamat').val(data.alamat_penduduk)
                $('#nohp').val(data.nohp_penduduk)
                $('#nik').val(data.nik)
                // document.getElementById('foto').src = 'images/admin/' + data.admin_foto
                $('#exampleEdit').modal()
            }
        })
    }
</script>