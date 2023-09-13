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
              <a class="nav-link active " aria-current="page" href="/admin/dashlantai1">Home</a>
              <a class="nav-link " href="/admin/pemesanan1">Pemesanan</a>
              <a class="nav-link " href="/admin/arsip">Arsip</a>
              <a class="nav-link" href="/admin/">Informasi</a>
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
<!-- CODE UNTUK LANTAI -->
      <div class="nav-item dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Lantai 1
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="/admin/dashlantai1">Lantai 1</a></li>
          <li><a class="dropdown-item" href="/admin/dashlantai2">Lantai 2</a></li>
          <li><a class="dropdown-item" href="/admin/dashlantai3">Lantai 3</a></li>
        </ul>
        <a class="btn btn-light " href="/admin/editmeja" type="button" >
          Manajemen Meja
        </a>
      </div>
      <br> @foreach ($meja as $m )
        
      @if ($m -> no_meja == 9)
      <br>
      <div class="row">
      <div class="" style="width: 10rem;">
        <div class="card-body">
          <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
          @if ($m -> status == "Tersedia")
          <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-success" >{{ $m -> status }}</button>
          @elseif ($m -> status == "Rusak")                
          <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
          @elseif ($m -> status == "Evant")
          <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
          @endif
        </div>
      </div>
      @endif
            @if ($m -> no_meja == 8)
            <br>
            <div class="row">
            <div class="" style="width: 10rem;">
              <div class="card-body">
                <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
                @if ($m -> status == "Tersedia")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-success" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Rusak")                
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Evant")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
                @endif
              </div>
            </div>
            @endif
            @if ($m -> no_meja == 7)
      
            <div class="" style="width: 10rem;">
              <div class="card-body">
                <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
                @if ($m -> status == "Tersedia")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-success" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Rusak")                
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Evant")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
                @endif
              </div>
            </div>
            @endif
            @if ($m -> no_meja == 6)
           
            <div class="" style="width: 10rem;">
              <div class="card-body">
                <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
                @if ($m -> status == "Tersedia")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-success" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Rusak")                
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Evant")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
                @endif
              </div>
            </div>
            @endif
            @if ($m -> no_meja == 5)
           
            <div class="" style="width: 10rem;">
              <div class="card-body">
                <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
                @if ($m -> status == "Tersedia")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-success" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Rusak")                
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Evant")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
                @endif
              </div>
            </div>
            @endif
            @if ($m -> no_meja == 4)
            &nbsp;&nbsp;
            <div class="" style="width: 10rem;">
              <div class="card-body">
                <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
                @if ($m -> status == "Tersedia")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-success" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Rusak")                
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Evant")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
                @endif
              </div>
            </div>
            @endif
            @if ($m -> no_meja == 3)
            &nbsp;&nbsp;
            <div class="" style="width: 10rem;">
              <div class="card-body">
                <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
                @if ($m -> status == "Tersedia")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-success" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Rusak")                
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Evant")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
                @endif
              </div>
            </div>
            @endif
            @if ($m -> no_meja == 2)
            &nbsp;&nbsp;
            <div class="" style="width: 10rem;">
              <div class="card-body">
                <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
                @if ($m -> status == "Tersedia")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-success" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Rusak")                
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Evant")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
                @endif
              </div>
            </div>
            @endif
            @if ($m -> no_meja == 1)
            &nbsp;&nbsp;
            <div class="" style="width: 10rem;">
              <div class="card-body">
                <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
                @if ($m -> status == "Tersedia")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-success" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Rusak")                
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
                @elseif ($m -> status == "Evant")
                <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
                @endif
              </div>
            </div>
          </div>
          @endif
          @endforeach
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>