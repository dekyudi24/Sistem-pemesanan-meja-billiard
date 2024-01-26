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
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <ul></ul>
        <div class="navbar-nav">
          <a class="nav-link " aria-current="page" href="dashboard">Home</a>
          <a class="nav-link active" href="#">Pemesanan</a>
          <a class="nav-link" href="informasi">Informasi</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{Auth::user()->nama}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="profil">Profil</a></li>
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
      <form action="/pesanan/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari pesanan..." value="{{old('cari')}}"> 
        <input type="submit" value="CARI">
      </form>
    </div>
  </nav>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <!-- Modal Tambah-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="mb-3">
          <label class="btn btn text-danger"><b>PERHATIAN</b> <br> Setelah anda membuat pemesanan dan pembayaran, pemesanan tidak dapat di hapus.</label>
        </div>
        <div class="modal-body">
          <form method="POST" action="/pemesanan" enctype="multipart/form-data" name="autoSumForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="mb-3">
              <input type="hidden" class="form-control" name="id_pelanggan" value="{{Auth::user()->id}}" required>
              <input type="hidden" class="form-control" name="tanggal_pesanan" value="<?php echo date('y-m-d'); ?>">
              <input type="hidden" class="form-control" name="nama_pemesanan" value="{{Auth::user()->nama}}">
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
              <label class="form-label">DP </label>
              <input type="text" class="form-control" name="dp" required value="50%">
            </div>
            <div class="mb-3">
              <label for="disabledSelect" class="form-label">Pilih jam mulai</label>
              <select id="disabledSelect" class="form-select" name="waktu_mulai" required>
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
              <input type="number" class="form-control" name="durasi" onFocus="startCalc();" onBlur="stopCalc();" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Total Biaya</label>
              <input type="text" class="form-control" name="total_biaya" value="0" readonly>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" value="simpan">Pesan </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal view-->
  <br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">No. Pesanan</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Jam mulai</th>
        <th scope="col">Jam selesai</th>
        <th scope="col">Paket Main</th>
        <th scope="col">Status</th>
        <th scope="col">Status main</th>
        <th width="30%" scope="col">Keterangan</th>
        <th scope="col">
          <center>Aksi</center>
        </th>
      </tr>
    </thead>
    @php
    $no=0;
    @endphp
    @foreach ($pesan as $p )
    @if (Auth::user()->id == $p->id_pelanggan)
    <tbody>
      <tr>
        <th scope="row">{{ ++ $no}}</th>
        <td>{{ $p->id_pesanan }}</td>
        <td>{{ $p->tanggal_pesanan }}</td>
        <td>{{ $p->waktu_mulai }}</td>
        <td>{{ $p->waktu_selesai }}</td>
        <td>
          {{ $p->durasi }} jam
        </td>
        <td>
          @if ($p ->status == "Valid")
          <a class=" d-grid gap-4 col-10 mx-auto text-success " style="text-decoration:none"> <b>{{ $p ->status }}</b></a>
          @elseif ($p ->status == "Invalid")
          <a class=" d-grid gap-4 col-10 mx-auto text-danger" style="text-decoration:none"><b>{{ $p ->status }}</b></a>
          @elseif ($p ->status == "Proses")
          <a class=" d-grid gap-4 col-10 mx-auto text-warning" style="text-decoration:none"><b>{{ $p ->status }}</b></a>
          @endif
        </td>

        <td>
          @if ($p ->status_main == "Selesai")
          <a class=" d-grid gap-4 col-10 mx-auto text-success " style="text-decoration:none"> <b>{{ $p ->status_main }}</b></a>
          @elseif ($p ->status_main == "Main")
          <a class=" d-grid gap-4 col-10 mx-auto text-danger" style="text-decoration:none"><b>{{ $p ->status_main }}</b></a>
          @elseif ($p ->status_main == "Booking")
          <a class=" d-grid gap-4 col-10 mx-auto text-warning" style="text-decoration:none"><b>{{ $p ->status_main }}</b></a>
          @endif
        </td>
        <td>{{ $p->keterangan }}</td>
        <td>
          <center>
            @if ($p ->status == "" || $p ->status == "Invalid")
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#upload{{ $p->id_pesanan }}" href=""><i class="fa fa-trash"></i> upload</a>
            @else
            @endif
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihat{{ $p->id_pesanan }}" href=""><i class="fa fa-eye"></i> lihat</a>
            @if ($p-> status=="Valid")
            <a class="btn btn-primary" href="{{route('invoice.pelanggan',$p->id_pesanan)}}"><i class="fa fa-eye"></i> cetak</a>
            @endif

          </center>
        </td>
      </tr>
    </tbody>
    @endif
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
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Auth::user()->nama}}">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-2 col-form-label">No meja</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p->meja->no_meja }}">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Jam mulai</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p-> waktu_mulai }}">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-2 col-form-label">DP</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p-> dp }}">
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Durasi (jam)</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $p-> durasi }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ optional($p->pembayaran)->metode_pembayaran }}">
                </div> 
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Total biaya</label>
                  <div class="col-sm-10">
                      <?php
                          $formattedTotalBiaya = "Rp " . number_format($p->total_biaya, 0, ',', '.');
                      ?>
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $formattedTotalBiaya }}">
                  </div>
              </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Bukti transfer</label>
                  <div class="col-sm-8">
                    <img src="/img/{{ optional($p->pembayaran)->bukti_transfer }}" height="70%" width="30%" alt="" type="text" readonly class="form-control-plaintext" id="staticEmail">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal button upload -->
    <div class="modal fade" id="upload{{ $p->id_pesanan }}" tabindex="-1" aria-labelledby="uploadLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="uploadLabel">Kirim bukti transfer 50%</h5>
          </div>
          <form method="POST" action="/pemesanan/upload" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" class="form-control" value="{{ $p-> id_pesanan }}" name="id_pesanan">
            <div class="form-group mb-3">
              <label class="form-label">Total Yang Dibayar</label>
              <?php 
                  $hasil = "Rp " . number_format(($p->total_biaya) / 2, 0, ',', '.');
                  echo $hasil;
              ?>
            </div>
            <div class="form-group mb-3">
              <label for="disabledSelect" class="form-label">Pilih Pembayaran</label>
              <select id="disabledSelect" class="form-select" name="metode_pembayaran" required>
                <option>BCA 08229603 a.n. I KADEK YUDIANTORO</option>
                <option>BRI 301001025524534 I KADEK YUDIANTORO</option>
                <option>OVO 082296034309 I KADEK YUDIANTORO</option>
                <option>DANA 082296034309 I KADEK YUDIANTORO</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Bukti Transfer</label>
              <input type="file" class="form-control" name="bukti_transfer">
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" value="simpan">Bayar </button>
            </div>
        </div>
      </div>
      </form>
    </div>
    @endforeach
  </table>

</body>
<script>
  function startCalc() {

    interval = setInterval("calc()", 1);
  }

  function calc() {

    one = document.autoSumForm.durasi.value;

    document.autoSumForm.total_biaya.value = (one * 35000);
  }

  function stopCalc() {

    clearInterval(interval);
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- JS files: jQuery pertama, lalu Popper.js, selanjutnya Bootstrap JS, lalu Font Awesome JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script>

</html>