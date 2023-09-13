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
  <!-- Modal -->
  
  <form method="POST" action="/admin/editmeja">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">tambah meja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="mb-3">
              <label class="form-label">No. meja</label>
              <input type="text" class="form-control" name="no_meja">
            </div>
            <div class="mb-3">
              <label for="disabledSelect" class="form-label">Lantai</label>
              <select id="disabledSelect" class="form-select" name="lantai">
                <option value="01">Lantai 1</option>
                <option value="02">Lantai 2</option>
                <option value="03">Lantai 3</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="disabledSelect" class="form-label">Status</label>
              <select id="disabledSelect" class="form-select" name="status">
              <option value="Evant">Evant</option>
              <option value="Rusak">Rusak</option>
              <option value="Tersedia">Tersedia</option>
            </select>
              </div>
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" value="simpan">Simpan </button>
        </div>
      </div>
    </div>
  </div>
</form>
  <!-- view table -->
  <br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No meja</th>
            <th scope="col">Lantai</th>
            <th scope="col">Status</th>
            <th scope="col"><center>Aksi</center></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($meja as $m )
          <tr>
            <td>{{ $m->no_meja }}</td>
            <td>lantai {{ $m->lantai }}</td>
            <td>{{ $m->status }}</td>
            <td><center>
              <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $m->no_meja }}" href=""><i class="fa fa-trash"></i> hapus</a>
              <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihat{{ $m->no_meja }}" href=""><i class="fa fa-eye"></i> lihat</a>
              <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $m->no_meja }}" href=""><i class="fa fa-pencil"></i> edit</a>
            </center>
             
            </td>
          </tr>
       
        
<!-- Modal button hapus-->
<div class="modal fade" id="hapus{{ $m->no_meja }}" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <p class="modal-title" id="hapusLabel">Apakah anda yakin?</p>
      </div>
      <div class="modal-footer">
        <a href="/admin/editmeja/{{$m->id_meja}}" class="btn btn-danger">Ya</a>
        <button type="button" class="btn btn-primary">Tidak</button>
      </div>
    </div>
  </div>
</div>
</tbody>


      <!-- Modal button lihat -->
<div class="modal fade" id="lihat{{ $m->no_meja }}" tabindex="-1" aria-labelledby="lihatLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lihatLabel">Lihat data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">No.&nbsp;meja</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $m-> no_meja }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Lantai</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $m-> lantai }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $m-> status }}">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


 <!-- Modal edit -->
 <div class="modal fade" id="edit{{ $m->no_meja }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Edit meja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/admin/editmeja/edit" >
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="hidden" class="form-control" value="{{ $m-> id_meja }}" name="id_meja">
          <div class="mb-3">
            <label class="form-label">No. meja</label>
            <input type="text" class="form-control" value="{{ $m-> no_meja }}" name="no_meja">
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Lantai</label>
            <select id="disabledSelect" class="form-select"  name="lantai">
              <option value="01">Lantai 1</option>
              <option value="02">Lantai 2</option>
              <option value="03">Lantai 3</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Status</label>
                <select id="disabledSelect" class="form-select" name="status">
                <option value="Evant">Evant</option>
                <option value="Rusak">Rusak</option>
                <option value="Tersedia">Tersedia</option>
              </select>
          </div>
</div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" value="simpan">Simpan </button>
          </div>
      </div>
    </div>
  </div>
</form>
@endforeach </table> 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- JS files: jQuery pertama, lalu Popper.js, selanjutnya Bootstrap JS, lalu Font Awesome JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script>

</html>