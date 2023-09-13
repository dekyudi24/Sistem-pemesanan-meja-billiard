<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        background-image: url(img/yud.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
        
    }

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
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
                height: 450px;
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
                <form>
                    <div class="mb-3">
                      <label class="form-label fs-3"  ><b><font face="Roboto" color="WHITE" size="6">SIGN UP</font></b></label>
                    </div>
                    <br>
                    <div class="text-start">
                      <input type="Text" class="form-control form-control-lg"  placeholder="Username">
                      
                    </div>
                    <br>
                    <br>
                    <div class="text-start">
                      <input type="Password" class="form-control form-control-lg" placeholder="Password">
                      
                    </div>
                    <br>
                    <br>
                      <div class="text-start">
                        <a href="dashboard" class="btn btn-primary d-grid gap-2 form-control-lg">LOGIN</a> 
                      </div>
                    
                    <div class="mb-5">
                        <label class="form-label"><font face="arial" color="WHITE" size="2">Belum memiliki akun?</font></label>
                        <a href="registrasi">Sign In</a>
                      </div>
                  </form>
            </div>
          </div>
        </div>
</body>
</html>