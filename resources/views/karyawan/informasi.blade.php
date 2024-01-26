<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="/img/logo.png" alt="" width="150" height="120">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul>
            <div class="navbar-nav">
              <a class="nav-link " aria-current="page" href="/karyawan/dashlantai1">Home</a>
              <a class="nav-link " href="/karyawan/pemesanan">Pemesanan</a>
              <a class="nav-link active" href="/karyawan/informasi">Informasi</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->nama}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="profil">Profil</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </div>
        </div>
       
      </nav>
      <div class="card text-center">
        <div class="fw-bold">
          SOP pada Billiard Predator
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Peraturan untuk Pelanggan</h5>
                <p class="text-start fw-lighter">1. Tidak boleh membawa makanan atau minuman dari luar.</p>
                <p class="text-start fw-lighter">2. Saat menyewa meja, jika terjadi kerusakan/kehilangan yang disebabkan oleh pelanggan, maka pelanggan yang akan mengganti rugi.</p>
                <p class="text-start fw-lighter">3. Hanya 6 orang yang dapat bermain dalam satu meja.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Peraturan Pemesanan</h5>
                <p class="text-start fw-lighter">1. Setelah melakukan pemesanan, pelanggan harus membayar dp 50% agar dapat divalidasi pesananya oleh admin.</p>
                <p class="text-start fw-lighter">2. Pengiriman bukti pembayaran harus dikirim 15 menit sebelum waktu pemesanan yg dipilih. Jika tidak, maka pesanan otomatis hangus.</p>
                <p class="text-start fw-lighter">3. Sebelum melakukan pemesanan dan melakukan pembayaran, pelanggan tidak dapat membatalkan pesanan yang sudah dibuat sebelumnya.</p>
                <p class="text-start fw-lighter">4. Setelah pesanan pelanggan sudah divalidasi oleh admin, keterlambatan hanya 15 menit dari waktu pesan. Jika lebih dari 15 menit pelanggan belum datang, maka pesanan akan hangus secara otomatis dan uang DP tidak dapat dikembalikan lagi.</p>
              </div>
            </div>
          </div>
        </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>