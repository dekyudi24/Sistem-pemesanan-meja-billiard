<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
              <a class="nav-link active " aria-current="page" href="/admin/dashlantai1">Home</a>
              <a class="nav-link " href="/admin/pemesanan1">Pemesanan</a>
              <a class="nav-link " href="/admin/arsip">Arsip</a>
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
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Jadwal Meja {{ $meja->no_meja }}</div>
        </div>
        <div class="card-body">
            @php
            $startDate = now();
            $endDate = $startDate->copy()->endOfYear()->month(12)->day(31);
            @endphp

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Hari/Tanggal</th>
                        @foreach ($times as $time)
                            <th scope="col">{{ $time }}</th>
                        @endforeach
                    </tr>
                </thead>


                <tbody>
                    @while ($startDate->lt($endDate))
                        <tr>
                            <td scope="row">{{ $startDate->format('d/m/Y') }}</td>
                            @foreach ($times as $time)
                                <td>
                                    @if ($meja)
                                        @php
                                            $infoPemesanan = null;
                                        @endphp
                                        @foreach ($pesanan as $p)
                                            @if ($p->id_meja == $meja->id_meja && $p->tanggal_pesanan == $startDate->format('Y-m-d'))
                                                @php
                                                    $mulai = \Carbon\Carbon::parse($p->waktu_mulai)->format('H:i');
                                                    $selesai = \Carbon\Carbon::parse($p->waktu_selesai)->format('H:i');
                                                @endphp
                                                @if ($mulai <= $time && $selesai >= $time)
                                                    @php
                                                        $infoPemesanan = $p;
                                                    @endphp
                                                @endif
                                            @endif
                                        @endforeach
                
                                        @if ($infoPemesanan)
                                            {{ $infoPemesanan->nama_pemesanan }}
                                            <br>
                                            {{ \Carbon\Carbon::parse($infoPemesanan->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($infoPemesanan->waktu_selesai)->format('H:i') }}
                                        @endif
                                    @else
                                        {{-- Meja tidak ditemukan, tampilkan pesan kesalahan atau penanganan yang sesuai --}}
                                        <p>Meja tidak ditemukan.</p>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        @php
                            $startDate->addDay();
                        @endphp
                    @endwhile
                </tbody>
                
                
                
            </table>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>