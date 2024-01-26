<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!DOCTYPE html>
<html lang="en" >
 
<head>

  <meta charset="UTF-8">
  <title>Template Faktur Untuk Kasir HTML</title>
 
  <style>
@media print {
    .page-break { display: block; page-break-before: always; }
}
      #invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;
}
#invoice-POS ::selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS ::moz-selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: .9em;
}
#invoice-POS h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
#invoice-POS p {
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}
#invoice-POS #top {
  min-height: 100px;
}
#invoice-POS #mid {
  min-height: 80px;
}
#invoice-POS #bot {
  min-height: 50px;
}
#invoice-POS #top .logo {
  height: 40px;
  width: 150px;
  background: url(https://www.sistemit.com/wp-content/uploads/2020/02/SISTEMITCOM-smlest.png) no-repeat;
  background-size: 150px 40px;
}
#invoice-POS .clientlogo {
  float: left;
  height: 60px;
  width: 60px;
  background: url(https://www.sistemit.com/wp-content/uploads/2020/02/SISTEMITCOM-smlest.png) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
#invoice-POS .info {
  display: block;
  margin-left: 0;
}
#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: .5em;
  background: #EEE;
}
#invoice-POS .service {
  border-bottom: 1px solid #EEE;
}
#invoice-POS .item {
  width: 24mm;
}
#invoice-POS .itemtext {
  font-size: .5em;
}
#invoice-POS #legalcopy {
  margin-top: 5mm;
}
 
    </style>
 
  <script>
  window.console = window.console || function(t) {};
</script>
 
 
 
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
 
 
</head>
 
<<body translate="no" >
 
 
  <div id="invoice-POS">
 
    <center 
    </center><!--End InvoiceTop-->
 
    <div id="mid">
      <div class="info">
        <p class="legal"><strong>Terimakasih dan Selamat Bermain!</strong> 
        </p>
        
      </div>
    </div><!--End Invoice Mid-->
 
    <div id="bot">
 
                    <div id="table">
                        <table>
                          <tr class="service">
                            <td class="tableitem"><p class="itemtext">Id pesanan</p></td>
                            <td class="tableitem"><p class="itemtext"></p></td>
                            <td class="tableitem"><p class="itemtext">{{ $pesan-> id_pesanan }} </p></td>
                        </tr>

                            <tr class="service">
                                <td class="tableitem"><p class="itemtext">Nama</p></td>
                                <td class="tableitem"><p class="itemtext"></p></td>
                                <td class="tableitem"><p class="itemtext">{{ $pesan-> nama_pemesanan }}</p></td>
                            </tr>
 
                            <tr class="service">
                                <td class="tableitem"><p class="itemtext">No meja</p></td>
                                <td class="tableitem"><p class="itemtext"></p></td>
                                <td class="tableitem"><p class="itemtext">{{ $pesan->meja-> no_meja }}</p></td>
                            </tr>
 
                            <tr class="service">
                                <td class="tableitem"><p class="itemtext">Jam mulai</p></td>
                                <td class="tableitem"><p class="itemtext"></p></td>
                                <td class="tableitem"><p class="itemtext">{{ $pesan-> waktu_mulai }}</p></td>
                            </tr>
 
                            <tr class="service">
                                <td class="tableitem"><p class="itemtext">DP</p></td>
                                <td class="tableitem"><p class="itemtext"></p></td>
                                <td class="tableitem"><p class="itemtext">{{ $pesan-> dp }}</p></td>
                            </tr>

                            <tr class="service">
                              <td class="tableitem"><p class="itemtext">Durasi</p></td>
                              <td class="tableitem"><p class="itemtext"></p></td>
                              <td class="tableitem"><p class="itemtext">{{ $pesan-> durasi }} jam</p></td>
                          </tr>

                            <tr class="service">
                              <td class="tableitem"><p class="itemtext">Metode pembayaran</p></td>
                              <td class="tableitem"><p class="itemtext"></p></td>
                              <td class="tableitem"><p class="itemtext">{{ $pesan-> metode_pembayaran }}</p></td>
                          </tr>
                          <tr class="tabletitle">
                            <td class="tableitem"><p class="itemtext">Total </p></td>
                            <td class="tableitem"><p class="itemtext"></p></td>
                            <td class="tableitem"><p class="itemtext">{{ $pesan->total_biaya }}</p></td>
                          </tr>
                          <tr class="tabletitle">
                            <td class="tableitem"><p class="itemtext">DP</p></td>
                            <td class="tableitem"><p class="itemtext"></p></td>
                            <td class="tableitem">
                              <p class="itemtext">{{ "Rp " . number_format(($pesan->total_biaya) / 2, 0, ',', '.') }}</p>
                          </td></p></td>
                        </tr>
                      
                          <tr class="tabletitle">
                            <td class="tableitem"><p class="itemtext">Sisa yang Dibayar</p></td>
                            <td class="tableitem"><p class="itemtext"></p></td>
                            <td class="tableitem"><p class="itemtext"><b><?php 
                              $hasil = ( $pesan->total_biaya)/2;
                              echo $hasil;
                              ?></b></h2></td></p></td>
                        
 
                        </table>
                    </div><!--End Table-->
 
                    <div id="legalcopy">
                        
                    </div>
                    <p> 
                      Jl. Pringgodani No.6e, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</br>
                       
                    </p>
                </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

</body>
 
</html>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- JS files: jQuery pertama, lalu Popper.js, selanjutnya Bootstrap JS, lalu Font Awesome JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script> 