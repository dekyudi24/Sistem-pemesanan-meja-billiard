<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="/img/logo.png" alt="" width="150" height="120">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
             <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul>
            <div class="navbar-nav">
              <a class="nav-link  " aria-current="page" href="/admin/dashlantai1">Home</a>
              <a class="nav-link " href="/admin/pemesanan1">Pemesanan</a>
              <a class="nav-link " href="/admin/arsip">Arsip</a>
              <a class="nav-link" href="/admin/informasi">Informasi</a>
              <a class="nav-link active " href="/admin/laporan">Laporan</a>
              <a class="nav-link " href="/admin/pengguna">Pengguna</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->nama}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="/admin/profil">Profil</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                    <div class="row">
                        <div class="col">
                          <input type="date" name="tglawal" id="tglawal" class="form-control" >
                        </div>
                        <div class="col">
                          <input type="date" name="tglakhir" id="tglakhir" class="form-control" >
                        </div>
                        <div class="col">
                            <a href="" onclick="this.href='/admin/cetaklaporan/'+ document.getElementById('tglawal').value + '/' +  document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary">Cetak Laporan Pertanggal</a>
                        </div>
                    </div>
            </div>
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>