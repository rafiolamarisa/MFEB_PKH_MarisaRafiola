<style>
  .hero {
    position: relative;
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .hero::before {
    content: "";
    background-image: url('./images//bghome.jpg');
    background-size: cover;
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    opacity: 0.75;
  }
</style>
<!-- style="height: 100%; background: url('./images//bghome.jpg'); background-position: center;
background-repeat: no-repeat;background-size: cover;opacity: 0.5;" -->
<div class="hero">

  <!-- Breadcrumbs-->
  <!-- <ol class="breadcrumb">
    <li class=" breadcrumb-item active">
      Home
    </li>
  </ol> -->

  <!-- Icon Cards-->
  <center>
    <div class="row" style="position: relative;
    top: 0;">
      <div class="col-md-12">

        <marquee behavior="" direction="" style="font-size: larger;font-weight:bold;">Selamat datang di website Sistem Informasi Pendukung Keputusan Penerimaan Bantua PKH Dinas Sosial Kabupaten Lima Puluh Kota</marquee>

        <img src="./images/logodinsos.png" width="300px" alt="" class="">
      </div>

    </div>

  </center>
  <div class="row">

    <!-- 
    <div class="col-xl-4 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-clock"></i>
          </div>
          <div class="mr-5">
            <h3 id="jamDigital"></h3>
          </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Jam Digital</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>

    <div class="col-xl-4 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-user"></i>
          </div>
          <?php
          $ambil = $koneksi->query("SELECT COUNT(*) FROM tbl_admin");
          $pecah = $ambil->fetch_assoc();
          // var_dump($pecah['COUNT(*)']);
          // // $admin = $pecah->num_row();
          // $admin = mysqli_num_rows($ambil);
          ?>
          <div class="mr-5"><?php echo $pecah['COUNT(*)'] ?> Admin</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="?page=pages/admin/index">
          <span class="float-left">Lihat Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-users"></i>
          </div>
          <?php
          $ambil = $koneksi->query("SELECT COUNT(*) FROM tbl_penduduk");
          $pecah = $ambil->fetch_assoc();
          // var_dump($pecah['COUNT(*)']);
          // // $admin = $pecah->num_row();
          // $admin = mysqli_num_rows($ambil);
          ?>
          <div class="mr-5"><?php echo $pecah['COUNT(*)'] ?> Penduduk</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="?page=pages/penduduk/index">
          <span class="float-left">Lihat Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div> -->



  </div>

</div>

<script>
  window.setTimeout("waktu()", 1000);

  function waktu() {
    var waktu = new Date();
    setTimeout("waktu()", 1000);
    var jam = waktu.getHours();
    var menit = waktu.getMinutes();
    var detik = waktu.getSeconds();

    var hasil = " " + jam + ":" + menit + ":" + detik + ""


    document.getElementById('jamDigital').innerHTML = hasil


  }
</script>