<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style >

        body {
            background-image: url(img/yud.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
        }

      
        
     </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<head>
    <style>
         .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.733); /* Ubah nilai alpha (0-1) sesuai kebutuhan */
        }
        .card {
            margin-right: auto;
            margin-left: auto;
            width: 250px;
            box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);
            height: 700px;
            border-radius: 5px;
            backdrop-filter: blur(14px);
            background-color: rgba(255, 255, 255, 0.151);
            padding: 10px;
            text-align: center;
        }
  
        .card img {
            height: 100%;
        }
    </style>
</head>
<body >
    <div class="overlay">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class=" card modal-transparan aligns-items-center text-center  mx-auto "style="width: 30rem;">
        <div class="card-body">
          <form method="POST" action="/registrasi/tambah" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="mb-3">
                  <label class="form-label fs-3"  ><b><font face="Roboto" color="WHITE" size="6">SIGN UP</font></b></label>
                </div>
                <br>
                <div class="text-start">
                  <input type="hidden" class="form-control form-control-lg" name="role" value="Pengguna" required>
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required>
                
                </div>
                <br>
                <br>
                <div class="text-start">
                  <input type="text" class="form-control form-control-lg" name="nama" placeholder="Nama" required>
                  
                </div>
                <br>
                <br>
                <div class="text-start">
                  <input type="text" class="form-control form-control-lg" name="alamat" placeholder="Alamat" required>
                    
                  </div>
                  <br>
                  <br>
                  <div class="text-start">
                    <input type="number" class="form-control form-control-lg" name="no_tlpn" placeholder="No.Tpl" required>
                    
                  </div>
                  <br>
                  <br>
                  <div class="text-start">
                    <input type="text" class="form-control form-control-lg" name="password" placeholder="Password" required>
                  </div>
                  <br>
                  <br>
                  <div class="text-start">
                    <button type="submit" class="btn btn-primary" value="simpan">Simpan </button>
                    
                  </div>
                
                <div class="mb-5">
                    <label class="form-label"><font face="arial" color="WHITE" size="2">Sudah memiliki akun?</font></label>
                    <a href="login">Sign In</a>
                  </div>
              </form>
        </div>
      </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>