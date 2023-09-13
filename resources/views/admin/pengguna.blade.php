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
              <a class="nav-link " href="/admin/pemesanan1">Pemesanan</a>
              <a class="nav-link " href="/admin/arsip">Arsip</a>
              <a class="nav-link" href="/admin/">Informasi</a>
              <a class="nav-link active" href="/admin/pengguna">Pengguna</a>
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
       <!-- Modal tambah member-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/admin/pengguna"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
              </div>
              <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" class="form-control" name="no_tlpn" required>
              </div>
              <div class="mb-3">
                <label for="disabledSelect" class="form-label">Role</label>
                <select id="disabledSelect" class="form-select" name="role">
                <option value="Admin">Admin</option>
                <option value="Karyawan">Karyawan</option>
                <option value="Pengguna">Pengguna</option>
              </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto">
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" required>
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
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col"><center>Aksi</center></th>
          </tr>
        </thead>
        <tbody>
          @php
            $no=0;
          @endphp
          @foreach ($user as $u )
            
          
            <tr>
              <th scope="row">{{ ++ $no}}</th>
              <td>{{ $u->nama }}</td>
              <td>{{ $u->username }}</td>
              <td>{{ $u->role }}</td>
              <td><center>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $no ?>" href=""><i class="fa fa-trash"></i> hapus</a>
                <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $u->id }}" href=""><i class="fa fa-pencil"></i> edit</a>
                <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#password{{ $u->id }}" href=""><i class="fa fa-key"></i> edit password</a>
            </center>
               
              </td>
            </tr>
      
            <!-- Modal edit member-->
            <div class="modal fade" id="edit{{ $u->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editLabel">Edit</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="/admin/pengguna/edit" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" class="form-control" value="{{ $u-> id }}" name="id">
                        <div class="mb-3">
                          <label class="form-label">Username</label>
                          <input type="text" class="form-control" value="{{ $u-> username }}" name="username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="{{ $u-> nama }}" name="nama">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" value="{{ $u-> alamat }}" name="alamat" >
                          </div>
                          <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" value="{{ $u-> no_tlpn }}" name="no_tlpn">
                          </div>
                          <div class="mb-3">
                            <!--<label class="form-label">Role</label>
                            <input type="text" class="form-control" value="{{ $u-> role }}" name="role" -->
                            <label for="disabledSelect" class="form-label">Role</label>
                            <select id="disabledSelect" class="form-select" name="role">
                            <option value="Admin">Admin</option>
                            <option value="Karyawan">Karyawan</option>
                            <option value="Pengguna">Pengguna</option>
                          </select>
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
                        <!-- Modal edit password-->
            <div class="modal fade" id="password{{ $u->id }}" tabindex="-1" aria-labelledby="passwordLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="passwordLabel">Edit password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="/admin/pengguna/editpassword">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                      <input type="hidden" class="form-control" value="{{ $u-> id }}" name="id">
                      <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" >
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
          <!-- Modal hapus member-->
          <div class="modal fade" id="hapus<?php echo $no ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h6 class="modal-title" id="hapusLabel">Apakah yakin untuk menghapus</h6>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
            </div>
                <div class="modal-body">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <a href="/admin/pengguna/{{$u->id}}" class="btn btn-danger">Ya</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
                     
</body>
@endforeach
</tbody>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- JS files: jQuery pertama, lalu Popper.js, selanjutnya Bootstrap JS, lalu Font Awesome JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script>
</html>