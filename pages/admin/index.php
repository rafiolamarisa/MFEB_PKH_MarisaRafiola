<h1>zahira sahwa nafiza</h1>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Admin</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Admin
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" style="margin-top: -10px; " href="#"><i class="fa fa-plus"></i> Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username Admin</th>
                            <th>Password Admin</th>
                            <th>Foto</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dataadmin = $db->tampilDataAdmin();
                        foreach ($dataadmin as $no => $pecah) :
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $pecah['admin_nama'] ?></td>
                                <td><?= $pecah['admin_username'] ?></td>
                                <td><?= substr($pecah['admin_password'], 0, 8) ?></td>
                                <td><img style="width: 100px;" src="images/admin/<?= $pecah['admin_foto'] ?>" alt=""></td>

                                <td>
                                    <button type="button" onclick="tampilModal2('<?= $pecah['admin_id'] ?>')" class="btn btn-info"><i class="fas fa-eye" title="Detail Admin"></i></button>

                                    <button type="button" onclick="tampilModal('<?= $pecah['admin_id'] ?>')" class="btn btn-warning" title="Edit Admin"><i class="fa fa-edit"></i></button>
                                    <a class="btn btn-danger" href="?page=pages/admin/hapusadmin&idhapus=<?= $pecah['admin_id']  ?>" title="Hapus Admin"><i class="fa fa-trash"></i></a>
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
                    // if (isset($_POST['save'])) {
                    $db->tambahData($_POST);
                    echo "     <script>alert('data berhasil disimpan')</script>";
                    echo "     <script>window.location='?page=pages/admin/index'</script>";
                }
                ?>
                <div class="container">


                    <form action="" method="POST" enctype="multipart/form-data" id="form_tambah_admin">

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tempat Lahir</label>
                                    <input type="text" name="tempat" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Lahir</label>
                                    <input type="date" name="tgllahir" class="form-control" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">No Telp</label>
                                    <input type="number" name="notelp" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" name="email" class="form-control" value="" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Username</label>
                            <input type="text" name="username" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <textarea name="alamat" cols="30" rows="5" class="form-control" required></textarea>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">Foto</label>
                            <input type="file" class="form-control-file" name="foto" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="form_edit_admin">
                    <?php if (isset($_POST['edit'])) {
                        $db->editdata($_POST);
                        echo "     <script>alert('data berhasil di edit')</script>";
                        echo "<meta http-equiv='refresh' content='0;url=?page=pages/admin/index'>";
                    } ?>
                    <input type="hidden" id="id" name="admin_id" class="form-control">
                    <div class="form-group">
                        <label>Nama admin</label>
                        <input type="text" class="form-control" id="admin_nama" name="admin_nama">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="font-weight-bold">Tempat Lahir</label>
                                <input type="text" name="admin_tempat" id="tempat" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" name="admin_tgllahir" id="tgllahir" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">No Telp</label>
                                <input type="number" name="admin_notelp" id="notelp" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" name="admin_email" id="email" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="admin_username" name="admin_username">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <textarea name="admin_alamat" cols="30" rows="5" id="alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <img id="foto" width="200">
                        <input type="hidden" class="form-control-file" name="gambar_lama" id="gambar_lama">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Gambar</label>
                        <input type="file" class="form-control-file" name="foto">
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

<div class="modal fade" id="detail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <center>

                        <img class="card" id="fotoDetail" alt="Foto Admin" width="300px">
                    </center>
                    <div class="card-body">
                        <p class="card-text pt-5" style="font-weight: bold;">DETAIL DATA ADMIN :</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="color: darkslateblue; font-weight: bold;">Nama Lengkap</span>
                                    </div>
                                    <input style="background-color: white;" type="text" class="form-control" id="namaAdmin" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="color: darkslateblue; font-weight: bold;">Email</span>
                                    </div>
                                    <input style="background-color: white;" type="text" class="form-control" id="emailAdmin" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="color: darkslateblue; font-weight: bold;">Tempat Lahir</span>
                                    </div>
                                    <input style="background-color: white;" type="text" class="form-control" id="tempatAdmin" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="color: darkslateblue; font-weight: bold;">Tanggal Lahir</span>
                                    </div>
                                    <input style="background-color: white;" type="date" class="form-control" id="tanggalAdmin" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="color: darkslateblue; font-weight: bold;">No Telp</span>
                                    </div>
                                    <input style="background-color: white;" type="text" class="form-control" id="notelpAdmin" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="color: darkslateblue; font-weight: bold;">Jenis Kelamin</span>
                                    </div>
                                    <input style="background-color: white;" type="text" class="form-control" id="jkAdmin" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="color: darkslateblue; font-weight: bold;">Username</span>
                                    </div>
                                    <input style="background-color: white;" type="text" class="form-control" id="usernameAdmin" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="color: darkslateblue; font-weight: bold;">Password</span>
                                    </div>
                                    <input style="background-color: white;" type="text" class="form-control" id="passwordAdmin" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="color: darkslateblue; font-weight: bold;">Alamat</span>
                                    </div>
                                    <textarea style="background-color: white;" id="alamatAdmin" cols="30" rows="5" class="form-control" aria-describedby="basic-addon1" readonly></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script script src="assets/jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>
<script>
    $("#form_tambah_admin").validate({
        rules: {
            nama: {
                required: true,
                maxlength: 15,
            },
            tempat: 'required',
            tgllahir: 'required',
            notelp: {
                required: true,
                number: true,
                maxlength: 12,
            },
            email: {
                required: true,
                email: true,
                maxlength: 15
            },
            jk: 'required',
            username: {
                required: true,
                maxlength: 10,
            },
            password: {
                required: true,
                maxlength: 10,
            },
            foto: 'required',


        },
        messages: {
            nama: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Nama Wajib Diisi</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Nama Max 15 Karakter</span>",
            },
            tempat: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Tempat Lahir Wajib Diisi</span>",
            },
            tgllahir: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Tanggal Lahir Wajib Diisi</span>",
            },
            notelp: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>No Hp wajib diisi</span>",
                number: "<span style='color:red;font-size:12px;font-style:italic'>Format harus angka</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Nohp maksimal sebanyak 12 karakter</span>",
            },
            email: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Email Wajib Diisi</span>",
                email: "<span style='color:red;font-size:12px;font-style:italic'>Format Harus Email</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Email maksimal sebanyak 15 karakter</span>",
            },
            jk: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Jenis kelamin Wajib diisi</span>",
            },
            username: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Username Diisi</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Username Max 10 Karakter</span>",
            },
            password: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Password Diisi</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Password Max 10 Karakter</span>",
            },
            foto: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Foto Wajib diisi</span>",
            },
        },
        errorElement: "span",
    })


    $("#form_edit_admin").validate({
        rules: {
            admin_nama: {
                required: true,
                maxlength: 15,
            },
            admin_tempat: 'required',
            admin_tgllahir: 'required',
            admin_notelp: {
                required: true,
                number: true,
                maxlength: 12,
            },
            admin_email: {
                required: true,
                email: true,
                maxlength: 15
            },
            jk: 'required',
            admin_username: {
                required: true,
                maxlength: 10,
            },
            admin_password: {
                required: true,
                maxlength: 10,
            },
            foto: 'required',


        },
        messages: {
            admin_nama: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Nama Wajib Diisi</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Nama Max 15 Karakter</span>",
            },
            admin_tempat: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Tempat Lahir Wajib Diisi</span>",
            },
            admin_tgllahir: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Tanggal Lahir Wajib Diisi</span>",
            },
            admin_notelp: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>No Hp wajib diisi</span>",
                number: "<span style='color:red;font-size:12px;font-style:italic'>Format harus angka</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Nohp maksimal sebanyak 12 karakter</span>",
            },
            admin_email: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Email Wajib Diisi</span>",
                email: "<span style='color:red;font-size:12px;font-style:italic'>Format Harus Email</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Email maksimal sebanyak 15 karakter</span>",
            },
            jk: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Jenis kelamin Wajib diisi</span>",
            },
            admin_username: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Username Diisi</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Username Max 10 Karakter</span>",
            },
            admin_password: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Password Diisi</span>",
                maxlength: "<span style='color:red;font-size:12px;font-style:italic'>Password Max 10 Karakter</span>",
            },
            foto: {
                required: "<span style='color:red;font-size:12px;font-style:italic'>Foto Wajib diisi</span>",
            },
        },
        errorElement: "span",
    })



    function tampilModal(id) {
        $.ajax({
            url: 'pages/admin/tampilEdit.php',
            type: 'POST',
            data: {
                'id': id
            },
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.admin_id)
                $('#admin_nama').val(data.admin_nama)
                $('#tempat').val(data.admin_tempat)
                $('#tgllahir').val(data.admin_lahir)
                $('#notelp').val(data.admin_notelp)
                $('#email').val(data.admin_email)
                $('#jk').val(data.admin_jk)
                $('#admin_username').val(data.admin_username)
                $('#admin_password').val(data.admin_password)
                $('#alamat').val(data.admin_alamat)
                $('#gambar_lama').val(data.admin_foto)
                document.getElementById('foto').src = 'images/admin/' + data.admin_foto
                $('#exampleEdit').modal()
            }
        })
    }

    function tampilModal2(id) {
        $.ajax({
            url: 'pages/admin/tampilEdit.php',
            type: 'POST',
            data: {
                'id': id
            },
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.admin_id)
                $('#namaAdmin').val(data.admin_nama)
                $('#tempatAdmin').val(data.admin_tempat)
                $('#tanggalAdmin').val(data.admin_lahir)
                $('#notelpAdmin').val(data.admin_notelp)
                $('#jkAdmin').val(data.admin_jk)
                $('#emailAdmin').val(data.admin_email)
                $('#usernameAdmin').val(data.admin_username)
                $('#passwordAdmin').val(data.admin_password)
                $('#alamatAdmin').val(data.admin_alamat)
                $('#gambar_lama').val(data.admin_foto)
                document.getElementById('fotoDetail').src = 'images/admin/' + data.admin_foto
                $('#detail').modal()
            }
        })
    }
</script>