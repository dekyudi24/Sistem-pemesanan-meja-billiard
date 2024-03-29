<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');

});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/registrasi', function () {
    return view('regis');
});
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');

Route::post('/registrasi/tambah', 'App\Http\Controllers\regisController@regis');

/*ADMIN*/

Route::get('/admin/dashlantai2', function () {
    return view('admin/dashlantai2');
});
Route::get('/admin/dashlantai3', function () {
    return view('admin/dashlantai3');  
});
/*Route::get('/admin/dashlantai1', function () {
    return view('admin/dashlantai1');  
});
Route::get('/admin/pesan1', function () {
    return view('admin/pemesanan1');
});
Route::get('/admin/pengguna', function () {
    return view('admin/pengguna');
});
Route::get('/admin/manajemenmeja', function () {
    return view('admin/editmeja');
}); */

/*ADMIN */

/*route ngecek role */
Route::get('Admin', function () {
    return view('/admin/dashlantai1');
})->middleware('checkRole:Admin');

Route::get('Karyawan', function () {
    return view('/karyawan/dashlantai1');
})->middleware('checkRole:Karyawan');


/*route meja */
Route::get('/admin/editmeja', 'App\Http\Controllers\mejaController@manajemenmeja');
Route::post('/admin/editmeja', 'App\Http\Controllers\mejaController@tambahmeja');
Route::get('/admin/editmeja/{id_meja}', 'App\Http\Controllers\mejaController@hapusmeja');
Route::post('/admin/editmeja/edit', 'App\Http\Controllers\mejaController@editmeja');
Route::get('/meja_billiard/cari', 'App\Http\Controllers\mejaController@cari');

/*route dashboard */
Route::get('/admin/dashlantai1', 'App\Http\Controllers\lantai1Controller@lantai1');
Route::get('/admin/dashlantai2', 'App\Http\Controllers\lantai1Controller@lantai2');
Route::get('/admin/dashlantai3', 'App\Http\Controllers\lantai1Controller@lantai3');
Route::get('/admin/jadwal/{id_meja}', 'App\Http\Controllers\lantai1Controller@jadwal')->name('jadwal');


/*route pemesanan */
Route::get('/admin/pemesanan1', 'App\Http\Controllers\pemesananController@pesanan');
Route::post('/admin/pemesanan1', 'App\Http\Controllers\pemesananController@tambahpesan');
Route::post('/admin/pemesanan1/edit', 'App\Http\Controllers\pemesananController@editpemesanan');
Route::get('/admin/pemesanan1/{id_pesanan}', 'App\Http\Controllers\pemesananController@hapuspesanan');
Route::get('/admin/cari', 'App\Http\Controllers\pemesananController@cari');
Route::get('/admin/struck/{id_pesanan}', 'App\Http\Controllers\invoiceadminController@sturck');

Route::get('/admin/informasi', function () {
    return view ('/informasi');
});

/*route arsip admin */
Route::get('/admin/arsip', 'App\Http\Controllers\arsipController@arsip');

/*route invoice */
Route::get('/invoiceadm/{id}', 'App\Http\Controllers\invoiceadminController@invoice');

/*route pengguna */
Route::get('/admin/pengguna', 'App\Http\Controllers\userController@lihatpengguna');
Route::post('/admin/pengguna', 'App\Http\Controllers\userController@tambahpengguna');
Route::get('/admin/pengguna/{id_pengguna}', 'App\Http\Controllers\userController@hapuspengguna');
Route::post('/admin/pengguna/edit', 'App\Http\Controllers\userController@editpengguna');
Route::post('/admin/pengguna/editpassword', 'App\Http\Controllers\userController@editpassword');

/*route pengguna profil */
Route::get('/admin/profil', 'App\Http\Controllers\profileadminController@profileadmin');
Route::post('/admin/profil/edit', 'App\Http\Controllers\profileadminController@editprofil');
Route::post('/admin/profil/editpassword', 'App\Http\Controllers\profileadminController@editpassword');
Route::post('/admin/profil/lihat', 'App\Http\Controllers\profileadminController@lihat');

Route::get('/admin/laporan', 'App\Http\Controllers\lantai1Controller@laporan');

Route::get('/admin/cetaklaporan/{tglawal}/{tglakhir}', 'App\Http\Controllers\lantai1Controller@cetaklaporan');
Route::get('/admin/informasi', function () {
    return view ('/admin/informasi');
});


/*PELANGGAN */
/*route pemesanan */
Route::get('/pemesanan', 'App\Http\Controllers\pesanplgController@pesanan');
Route::post('/pemesanan', 'App\Http\Controllers\pesanplgController@tambahpesan');
Route::post('/pemesanan/upload', 'App\Http\Controllers\pesanplgController@uploadpesan');
Route::get('/pesanan/cari', 'App\Http\Controllers\pesanplgController@cari');

/*PELANGGAN */
/*route home */
Route::get('/dashboard', 'App\Http\Controllers\homemejaplgController@lantai1plg');
Route::get('/dashlantai2', 'App\Http\Controllers\homemejaplgController@lantai2plg');
Route::get('/dashlantai3', 'App\Http\Controllers\homemejaplgController@lantai3plg');
Route::get('/jadwal/{id_meja}', 'App\Http\Controllers\homemejaplgController@jadwal')->name('jadwal_plg');

/*route pelanggan profil */
Route::get('/profil', 'App\Http\Controllers\profilepenggunaController@profileadmin');
Route::post('/profil/edit', 'App\Http\Controllers\profilepenggunaController@editprofil');
Route::post('/profil/editpassword', 'App\Http\Controllers\profilepenggunaController@editpassword');
Route::post('/profil/lihat', 'App\Http\Controllers\profilepenggunaController@lihat');

Route::get('/check-meja-availability', 'App\Http\Controllers\pesanplgController@checkReservationAvailability');
/*route invoice */
Route::get('/invoiceplg/{id}', 'App\Http\Controllers\invoiceplgController@invoice')->name('invoice.pelanggan');
Route::get('/informasi', function () {
    return view ('/informasi');
});




/*KARYAWAN */
/*route pemesanan */
Route::get('/karyawan/pemesanan', 'App\Http\Controllers\pesankaryawanController@pemesanan');
Route::post('/karyawan/pemesanan', 'App\Http\Controllers\pesankaryawanController@tambahpesan');
Route::post('/karyawan/pemesanan/edit', 'App\Http\Controllers\pesankaryawanController@editpemesanan');
Route::get('/karyawan/pemesanan/{id_pesanan}', 'App\Http\Controllers\pesankaryawanController@hapuspesanan');
Route::get('/karyawan/jadwal/{id_meja}', 'App\Http\Controllers\mejakaryawanController@jadwal')->name('jadwal_krw');
Route::get('/pesanan/cari', 'App\Http\Controllers\pesankaryawanController@cari');

/*route meja */
Route::get('/karyawan/editmeja', 'App\Http\Controllers\mejakaryawanController@manajemenmeja');
Route::post('/karyawan/editmeja', 'App\Http\Controllers\mejakaryawanController@tambahmeja');
Route::get('/karyawan/editmeja/{id_meja}', 'App\Http\Controllers\mejakaryawanController@hapusmeja');
Route::post('/karyawan/editmeja/edit', 'App\Http\Controllers\mejakaryawanController@editmeja');

Route::get('/karyawan/dashlantai1', 'App\Http\Controllers\lantaikaryawanController@lantai1');
Route::get('/karyawan/dashlantai2', 'App\Http\Controllers\lantaikaryawanController@lantai2');
Route::get('/karyawan/dashlantai3', 'App\Http\Controllers\lantaikaryawanController@lantai3');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/karyawan/informasi', function () {
    return view ('/karyawan/informasi');
});

/*route invoice */
Route::get('/invoice/{id}', 'App\Http\Controllers\invoicekaryawanController@invoice')->name('invoice.pelanggan');

/*route pengguna profil */
Route::get('/karyawan/profil', 'App\Http\Controllers\profilekaryawanController@profileadmin');
Route::post('/karyawan/profil/edit', 'App\Http\Controllers\profilekaryawanController@editprofil');
Route::post('/karyawan/profil/editpassword', 'App\Http\Controllers\profilekaryawanController@editpassword');
Route::post('/karyawan/profil/lihat', 'App\Http\Controllers\profilekaryawanController@lihat');


