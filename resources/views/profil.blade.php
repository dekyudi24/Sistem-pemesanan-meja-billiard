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
                <a class="nav-link " aria-current="page" href="dashboard">Home</a>
                <a class="nav-link " href="pemesanan1">Pemesanan</a>
                <a class="nav-link" href="informasi">Informasi</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <th>{{Auth::user()->nama}}</th>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="profil">Profil</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </div>
        </div>
       
      </nav>
      <div class="container">
        <section class="vh-200" style="background-color: #ffffff;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-25 col-lg-10 col-xl-5">
                  <div class="card" style="border-radius: 15px; background-color: #dfdfdf;">
                    <div class="card-body p-4 text-black">
                      <div>
                        <h5 class="mb-4">Profil</h5>
                      </div>
                      <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                          <img src="/img/{{Auth::user()->foto}}"
                            alt="Generic placeholder image" class="img-fluid rounded-circle border border-dark border-3"
                            style="width: 70px;" data-mdb-ripple-color="dark" data-bs-toggle="modal" data-bs-target="#lihat" >
                           
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div class="d-flex flex-row align-items-center mb-2">
                            <p class="mb-0 me-4">{{Auth::user()->nama}}</p>
                            <ul class="mb-0 list-unstyled d-flex flex-row" style="color: #1B7B2C;">
                              <li>
                                <i class="fas fa-star fa-xs"></i>
                              </li>
                              <li>
                                <i class="fas fa-star fa-xs"></i>
                              </li>
                              <li>
                                <i class="fas fa-star fa-xs"></i>
                              </li>
                              <li>
                                <i class="fas fa-star fa-xs"></i>
                              </li>
                              <li>
                                <i class="fas fa-star fa-xs"></i>
                              </li>
                            </ul>
                          </div>
                          <div>
                            <button type="button" class="btn btn-outline-dark btn-rounded btn-sm"
                              data-mdb-ripple-color="dark" data-bs-toggle="modal" data-bs-target="#edit" >Edit profil</button>
                            <button type="button" class="btn btn-outline-dark btn-rounded btn-sm"
                              data-mdb-ripple-color="dark" data-bs-toggle="modal" data-bs-target="#editpassword" >Ubah password</button>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <table class="table">
                        <tbody>
                          <tr>
                            <td scope="col">Nama</td>
                            <th>{{Auth::user()->nama}}</th>
                        </tr>
                        <tr>
                            <td scope="col">Username</td>
                            <th>{{Auth::user()->username}}</th>
                          </tr>
                          <tr>
                            <td scope="col">Alamat</td>
                            <th>{{Auth::user()->alamat}}</th>
                        </tr>
                        <tr>
                            <td scope="col">No. Tlpn</td>
                            <th>{{Auth::user()->no_tlpn}}</th>
                        </tr>
                          <tr>
                          <td scope="col">Role</td>
                          <th>{{Auth::user()->role}}</th>
                          <tr>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Modal Edit Profil -->
          <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editLabel">Edit</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="/profil/edit" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="id">
                    <div class="mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control" value="{{Auth::user()->username}}" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{Auth::user()->nama}}" name="nama">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" value="{{Auth::user()->alamat}}" name="alamat" >
                      </div>
                      <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" value="{{Auth::user()->no_tlpn}}" name="no_tlpn">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Role</label>
                        <input type="text" class="form-control" value="{{Auth::user()->role}}" name="role" >
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
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
        <!-- Modal Ubah Password-->
        <div class="modal fade" id="editpassword" tabindex="-1" aria-labelledby="editpasswordLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editpasswordLabel">Edit password</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="/profil/editpassword">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="id">
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" >
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" value="simpan">Simpan </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <!-- Modal lihat foto-->
                    <div class="modal fade" id="lihat" tabindex="-1" aria-labelledby="lihatLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                <div class="modal-body">
                  <form method="POST" action="/profil/editpassword">
                    <div class="mb-3">
                        <img src="/img/{{Auth::user()->foto}}">
                    </div>
      </div>
    </div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>