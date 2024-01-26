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
         <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul> <ul></ul>
        <div class="navbar-nav">
          <a class="nav-link  " aria-current="page" href="/admin/dashlantai1">Home</a>
          <a class="nav-link " href="/admin/pemesanan1">Pemesanan</a>
          <a class="nav-link active " href="/admin/arsip">Arsip</a>
          <a class="nav-link" href="/admin/informasi">Informasi</a>
          <a class="nav-link" href="/admin/laporan">Laporan</a>
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
  <br>
<div class="container-fluid">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">No. Pesanan</th>
        <th scope="col">No. Meja</th>
        <th scope="col">Paket Main</th>
        <th scope="col">Jam mulai</th>
        <th scope="col">Status</th>
        <th scope="col">Tgl Pesanan</th>
        <th scope="col">Status main</th>
        <th width="30%" scope="col">Keterangan</th>
        <th  scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @php
      $no=0;
    @endphp
      @foreach ($arsip as $p )
      <tr>
        <th scope="row">{{ ++ $no}}</th>
        <td>{{ $p->id_pesanan }}</td>
       <td @foreach ($meja as $m)
          @if( $m->id_meja === $p->id_meja)
          <option disabled type="text" value="{{ $m-> id_meja }}" {{ $m->id_meja === $p->id_meja ? 'selected' : '' }}>Meja {{ $m->no_meja }}</option>
          @endif
          @endforeach
      </td> 
        <td>   
          @if($p-> waktu_selesai != null)
          {{ $p->durasi }} jam
          @else
          <?php
          $Paket = strtotime($p->waktu_selesai)  - strtotime($p->waktu_mulai) ;
            $hasil = ($Paket/3600)*60;
            echo $hasil;
          ?> menit
          @endif
          
        </td>
        <td>{{ $p->waktu_mulai }}</td>

        <td>
        @if ($p ->status == "Valid")
            <a class=" d-grid gap-4 col-10 mx-auto text-success "style="text-decoration:none" > <b>{{ $p ->status }}</b></a>
            @elseif ($p ->status == "Invalid")                
            <a  class=" d-grid gap-4 col-10 mx-auto text-danger" style="text-decoration:none"><b>{{ $p ->status }}</b></a>
            @elseif ($p ->status == "Proses")
            <a  class=" d-grid gap-4 col-10 mx-auto text-warning" style="text-decoration:none"><b>{{ $p ->status }}</b></a>
            @endif
          </td>
          <td>{{ $p->tanggal_pesanan }}</td>
        <td>
          @if ($p ->status_main == "Selesai")
          <a class=" d-grid gap-4 col-10 mx-auto text-success "style="text-decoration:none" > <b>{{ $p ->status_main }}</b></a>
            @elseif ($p ->status_main == "Main")                
            <a  class=" d-grid gap-4 col-10 mx-auto text-danger" style="text-decoration:none"><b>{{ $p ->status_main }}</b></a>
            @elseif ($p ->status_main == "Booking")
            <a  class=" d-grid gap-4 col-10 mx-auto text-warning" style="text-decoration:none"><b>{{ $p ->status_main }}</b></a>
            @endif
        </td>
        <td>{{ $p->keterangan }}</td>
        <td>
          <a class="btn btn-primary" href="/admin/struck/{{ $p->id_pesanan }}"><i class="fa fa-eye"></i> cetak</a>

        </td>
      </tr>
    </tbody>
@endforeach
</table>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- JS files: jQuery pertama, lalu Popper.js, selanjutnya Bootstrap JS, lalu Font Awesome JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script>

</html>