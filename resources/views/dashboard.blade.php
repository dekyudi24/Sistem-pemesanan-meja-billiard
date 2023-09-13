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
              <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
              <a class="nav-link " href="/pemesanan">Pemesanan</a>
              <a class="nav-link" href="/informasi">Informasi</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->nama}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="/profil">Profil</a></li>
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
    <li><a class="dropdown-item" href="/dashboard">Lantai 1</a></li>
    <li><a class="dropdown-item" href="/dashlantai2">Lantai 2</a></li>
    <li><a class="dropdown-item" href="/dashlantai3">Lantai 3</a></li>
  </ul>
</div>
<br>
@if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
 @foreach ($meja as $m )
  
@if ($m -> no_meja == 9)
      <div class="row">
      <div class="" style="width: 10rem;">
        <div class="card-body">
          <button disabled class="d-grid gap-4 col-8 mx-auto btn btn-secondary"><br><br>{{ $m -> no_meja }} <br><br></button><br>
          @if ($m -> status == "Tersedia")
          <button class=" d-grid gap-4 col-10 mx-auto btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $m -> id_meja }}">{{ $m -> status }}</button>
          @elseif ($m -> status == "Rusak")                
          <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
          @elseif ($m -> status == "Evant")
          <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
          @endif
        </div>
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
          <button class=" d-grid gap-4 col-10 mx-auto btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ $m -> status }}</button>
          @elseif ($m -> status == "Rusak")                 
          <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-danger" >{{ $m -> status }}</button>
          @elseif ($m -> status == "Evant")
          <button disabled class=" d-grid gap-4 col-10 mx-auto btn btn-warning" >{{ $m -> status }}</button>
          @endif
        </div>
      </div>
      @endif
      @if ($m -> no_meja == 7)
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
      @if ($m -> no_meja == 6)
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
      @if ($m -> no_meja == 5)
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
    
    <!-- Modal Tambah-->
<div class="modal fade" id="exampleModal{{ $m -> id_meja }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="mb-3">
        <label  class="btn btn text-danger"><b>PERHATIAN</b> <br> Setelah anda melakukan pembayaran, uang DP tidak akan dikembalikan jika anda melakukan pembatalan.</label>
      </div>
      <div class="modal-body">
        <form method="POST" action="/pemesanan" enctype="multipart/form-data" name="autoSumForm">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <div class="mb-3">
            <input type="hidden" class="form-control" name="id_pelanggan" value="{{Auth::user()->id}}" required >
            <input type="hidden" class="form-control" name="tanggal_pesanan" value="<?php echo date('y-m-d'); ?>" >
            <input type="hidden" class="form-control" name="nama_pemesanan" value="{{Auth::user()->nama}}" >
            <input type="hidden" class="form-control" name="id_meja" value="{{ $m-> id_meja }}">
          </div>
          <div class="mb-3">
            <label class="form-label">DP </label>
            <input type="text" class="form-control" name="dp" required value="50%">
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Pilih jam mulai</label>
            <select id="disabledSelect" class="form-select" name="waktu_mulai" required>
              <option>09:00</option>
              <option>10:00</option>
              <option>11:00</option>
              <option>12:00</option>
              <option>13:00</option>
              <option>14:00</option>
              <option>15:00</option>
              <option>16:00</option>
              <option>17:00</option>
              <option>18:00</option>
              <option>19:00</option>
              <option>20:00</option>
              <option>21:00</option>
              <option>22:00</option>
              <option>23:00</option>
              <option>00:00</option>
              <option>01:00</option>
              <option>02:00</option>
              <option>03:00</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Durasi (jam) </label>
              <input type="number" class="form-control" name="durasi" onFocus="startCalc();" onBlur="stopCalc();" required > 
              
          </div>
          <div class="mb-3">
              <label for="disabledSelect" class="form-label">Metode Pembayaran</label>
              <select id="disabledSelect" class="form-select" name="metode_pembayaran" required>
                <option>BCA 08229603 a.n. I KADEK YUDIANTORO</option>
                <option>BRI 301001025524534 I KADEK YUDIANTORO</option>
                <option>OVO 082296034309 I KADEK YUDIANTORO</option>
                <option>DANA 082296034309 I KADEK YUDIANTORO</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Total Biaya</label>
              <input type="text" class="form-control" name="total_biaya" value="0" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Bukti Transfer</label>
              <input type="file" class="form-control" name="bukti_transfer">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="simpan">Simpan </button>
      </form>
      </div>
    </div>
  </div>
</div>

</body>
<script>

  function startCalc(){
  
  interval = setInterval("calc()",1);}
  
  function calc(){
  
  one = document.autoSumForm.durasi.value;
  
  document.autoSumForm.total_biaya.value = (one * 30000 );}
  
  function stopCalc(){
  
  clearInterval(interval);}
  
  </script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- JS files: jQuery pertama, lalu Popper.js, selanjutnya Bootstrap JS, lalu Font Awesome JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script>

</html>