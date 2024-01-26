<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      }

      .card {
      margin: 10px;
      }
    </style>
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
              <a class="nav-link active" aria-current="page" href="/karyawan/dashlantai1">Home</a>
              <a class="nav-link " href="/karyawan/pemesanan">Pemesanan</a>
              <a class="nav-link" href="informasi">Informasi</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->nama}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="/karyawan/profil">Profil</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>

<!-- CODE UNTUK LANTAI -->
<div class="nav-item dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Lantai 3
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="/karyawan/dashlantai1">Lantai 1</a></li>
    <li><a class="dropdown-item" href="/karyawan/dashlantai2">Lantai 2</a></li>
    <li><a class="dropdown-item" href="/karyawan/dashlantai3">Lantai 3</a></li>
  </ul>
</div>
<br> 
<!--div class="card">
  <div class="card-body">
    <div class="card-body mx-5" style="background-color:white;"> 
<div class="flex-container">
  <div class="row">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  @foreach ($meja as $m)
  @if ($m -> no_meja == 27)
  <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
    <div class="card-body ">
      <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
    </div>
    <div class="card-footer"></div>
  </div>
    @endif
    @endforeach
    @foreach ($meja as $m)
    @if ($m -> no_meja == 26)
    <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
      <div class="card-body ">
        <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
      </div>
      <div class="card-footer"></div>
    </div>
    @endif
    @endforeach
    @foreach ($meja as $m)
    @if ($m -> no_meja == 25)
    <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
      <div class="card-body ">
        <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
      </div>
      <div class="card-footer"></div>
    </div>
    @endif
    @endforeach
    @foreach ($meja as $m)
    @if ($m -> no_meja == 24)
    <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
      <div class="card-body ">
        <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
      </div>
      <div class="card-footer"></div>
    </div>
    @endif
    @endforeach
    @foreach ($meja as $m)
    @if ($m -> no_meja == 23)
    <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
      <div class="card-body ">
        <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
      </div>
      <div class="card-footer"></div>
    </div>
    @endif
    @endforeach
    @foreach ($meja as $m)
  @if ($m -> no_meja == 28)
  <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
    <div class="card-body ">
      <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
    </div>
    <div class="card-footer"></div>
  </div>
  &nbsp;&nbsp;
  
    @endif
    @endforeach
  </div>
</div>
<div class="flex-container">
    @foreach ($meja as $m)
    @if ($m -> no_meja == 22)
    <div class="row">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
        <div class="card-body ">
          <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
        </div>
        <div class="card-footer"></div>
      </div>
    
      @endif
      @endforeach
      @foreach ($meja as $m)
      @if ($m -> no_meja == 21)
      <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
        <div class="card-body ">
          <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
        </div>
        <div class="card-footer"></div>
          </div>
            @endif
            @endforeach
            @foreach ($meja as $m)
            @if ($m -> no_meja == 20)
            <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
              <div class="card-body ">
                <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
              </div>
              <div class="card-footer"></div>
            </div>
            @endif
            @endforeach
      @foreach ($meja as $m)
      @if ($m -> no_meja == 19)
          <div class="card d-grid gap-4 col-8 mx-3" style="width: 7rem; background-color:darkgray">
                <div class="card-body ">
                  <button disabled class="d-grid gap-4 col-10 mx-2 btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
                </div>
                <div class="card-footer"></div>
              </div>
              @endif
            @endforeach
          </div>
      </div>
    </div-->
    <head>
      <div class="container">
          
            <table class="table table-bordered">
              <thead>
                <tr style="column-span: 3"> <b> Jadwal Meja</b></tr>
              </thead>
              <tbody>
                  <tr align="center">
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 27)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 26)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 25)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 24)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                    <td ></td>
                    <td ></td>
                  </tr>

                  <tr align="center"> 
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 23)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 28)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                  </tr>

                  <tr align="center">
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 22)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 21)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 20)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                    @foreach ($meja as $m )
                    @if ($m -> no_meja == 19)
                    @if ($m -> status == "Tersedia")
                      <td ><a class="btn btn-success" href="{{ route('jadwal_plg', ['id_meja' => $m->id_meja]) }}" role="button"> Meja {{ $m -> no_meja }}</a></td>
                    @elseif($m -> status == "Rusak")
                    <td ><button class="btn btn-danger" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @else
                    <td ><button class="btn btn-warning" role="button"> Meja {{ $m -> no_meja }}</button></td>
                    @endif
                    @endif
                    @endforeach
                    <td ></td>
                    <td ></td>
                  </tr>
                </table>
                <table class="table table-bordered">
                  <thead>
                    <tr style="column-span: 2;"> <b>Keterangan</b></tr>
                  </thead>
                  <tbody>
                    <tr align="center">
                      <td><button class="btn btn-warning"></td>
                      <td>Event</td>
                    </tr>
                    <tr align="center">
                      <td><button class="btn btn-danger"></td>
                      <td>Rusak</td>
                    </tr>
                    <tr align="center">
                      <td><button class="btn btn-success"></td>
                      <td>Tersedia</td>
                    </tr>
                  </tbody>
                </table>
        </head>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>