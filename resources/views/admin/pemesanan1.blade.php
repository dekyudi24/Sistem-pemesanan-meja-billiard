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
          <a class="nav-link " aria-current="page" href="/admin/dashlantai1">Home</a>
          <a class="nav-link active" href="/admin/pemesanan1">Pemesanan</a>
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
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah (+)
      </button>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/admin/pemesanan1" name="autoSumForm">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <div class="mb-3">
            <label class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" name="nama_pemesanan" required >
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Pilih Meja</label>
            <select id="disabledSelect" class="form-select" name="id_meja">
              @foreach ($meja as $m)
              <option value="{{ $m-> id_meja }}">Meja {{ $m-> no_meja }}</option>
              @endforeach
            </select>
          </div><br>
          
          <label class="form-label">pilih jam mulai</label><br>
          <input type="time" class="form-control" name="waktu_mulai" onInput="calculateTotal();" required >
          <label class="form-label">pilih jam selesai</label><br>
          <input type="time" class="form-control" name="waktu_selesai" onInput="calculateTotal();" required >

          <input type="hidden" class="form-control" name="tanggal_pesanan" value="<?php echo date("Y-m-d"); ?>"  >
          </div>
            <div class="mb-3">
              <label class="form-label">Total Biaya</label>
              <input type="text" class="form-control" name="total_biaya" value="0" readonly >
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" value="simpan">Simpan </button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
  <br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">No. Pesanan</th>
            <th scope="col">Paket Main</th>
            <th scope="col">Jam mulai</th>
            <th scope="col">Status</th>
            <th scope="col">Status main</th>
            <th width="30%" scope="col">Keterangan</th>
            <th scope="col"><center>Aksi</center></th>
          </tr>
        </thead>
        <tbody>
          @php
          $no=0;
        @endphp
          @foreach ($pesan as $p )
          <tr>
            <th scope="row">{{ ++ $no}}</th>
            <td>{{ $p->id_pesanan }}</td>
            <td>   
              @if($p-> waktu_selesai == null)
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
            <td><center>
              <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $no ?>" href=""><i class="fa fa-trash"></i> hapus</a>
              <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihat{{ $p->id_pesanan }}" href=""><i class="fa fa-eye"></i> lihat</a>
              <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $p->id_pesanan }}" href=""><i class="fa fa-pencil"></i> edit</a>
            </center>
            
            </td>
          </tr>
        </tbody>
      
<!-- Modal button batal-->
<div class="modal fade" id="hapus<?php echo $no ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <p class="modal-title" id="hapusLabel">Apakah anda yakin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">tidak</button>
        <a href="/admin/pemesanan1/{{$p->id_pesanan}}" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>
      <!-- Modal button lihat -->
<div class="modal fade" id="lihat{{ $p->id_pesanan }}" tabindex="-1" aria-labelledby="lihatLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lihatLabel">Lihat data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">No. Pesanan</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p-> id_pesanan }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p-> nama_pemesanan }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">id_meja</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p-> id_meja }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Jam mulai</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p-> waktu_mulai }}">
          </div>
        </div>

        @if($p-> waktu_selesai == null)
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Durasi</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p->durasi }} jam">
          </div>
        </div>
              
              @else
              
               <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Jam_selesai</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p->waktu_selesai }} ">
                </div>
              </div>
              @endif
       
        
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Total biaya</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p-> total_biaya }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Bukti transfer</label>
          <div class="col-sm-10">
            <img src="/img/{{ $p->bukti_transfer }}" height="100%" width="100%" alt="" type="text" readonly class="form-control-plaintext" id="staticEmail">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          @if ($p-> status=="Valid")
              <a class="btn btn-primary" href="/invoice/{{ $p->id_pesanan }}"><i class="fa fa-eye"></i> cetak</a>
              @endif
        </div>
       
    </div>
  </div>
</div>
</div>
    
 <!-- Modal edit -->
 <div class="modal fade" id="edit{{ $p->id_pesanan }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Edit pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/admin/pemesanan1/edit">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="hidden" class="form-control" value="{{ $p-> id_pesanan }}" name="id_pesanan">
          <div class="mb-3">
            <label class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control"  value="{{ $p-> nama_pemesanan }}" name="nama_pemesanan" required >
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Pilih Meja</label>
            <select id="disabledSelect" class="form-select" name="id_meja">
              @foreach ($meja as $m)
              <option value="{{ $m-> id_meja }}">Meja {{ $m-> no_meja }}</option>
              @endforeach
            </select>
          </div>
            <div class="mb-3">
              <label class="form-label">Total Biaya</label>
              <input disabled type="text" class="form-control" value="{{ $p-> total_biaya }}" name="total_biaya" required >
            </div>
            <div class="mb-3">
              <label for="disabledSelect" class="form-label">Status</label>
                <select id="disabledSelect" class="form-select" name="status">
                <option value="Proses">Proses</option>
                <option value="Invalid">Invalid</option>
                <option value="Valid">Valid</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="disabledSelect" class="form-label">Status main</label>
                <select id="disabledSelect" class="form-select" name="status_main">
                <option value="Booking">Booking</option>
                <option value="Main">Main</option>
                <option value="Selesai">Selesai</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Keterangan</label>
              <input type="text" class="form-control" value="{{ $p-> keterangan }}" name="keterangan" >
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="simpan">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
</table>

</body>
<script>
  function calculateTotal() {
      var waktuAwal = document.autoSumForm.waktu_mulai.value;
      var waktuAkhir = document.autoSumForm.waktu_selesai.value;

      if (waktuAwal && waktuAkhir) {
          var selisihWaktu = calculateTimeDifference(waktuAwal, waktuAkhir);
          // Misalnya, kita asumsikan biaya per menit adalah 10.
          var biayaPerMenit = 500;
          var totalBayar = selisihWaktu * biayaPerMenit;
          document.autoSumForm.total_biaya.value = totalBayar;
      } else {
          document.autoSumForm.total_biaya.value = "0";
      }
  }

  function calculateTimeDifference(time1, time2) {
      var parts1 = time1.split(":");
      var parts2 = time2.split(":");
      
      var hours1 = parseInt(parts1[0]);
      var minutes1 = parseInt(parts1[1]);
      
      var hours2 = parseInt(parts2[0]);
      var minutes2 = parseInt(parts2[1]);
      
      var totalMinutes1 = (hours1 * 60) + minutes1;
      var totalMinutes2 = (hours2 * 60) + minutes2;
      
      return totalMinutes2 - totalMinutes1;
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- JS files: jQuery pertama, lalu Popper.js, selanjutnya Bootstrap JS, lalu Font Awesome JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script>

</html>