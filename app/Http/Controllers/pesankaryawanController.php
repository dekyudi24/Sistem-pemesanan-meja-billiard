<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;


class pesankaryawanController extends Controller
{
    public function pesanan(){
        $pesan = DB::table('pesanan') ->get();
        $meja = DB::table('meja_billiard') 
        ->orderBy('no_meja','asc')
        ->get();
        return view('/karyawan/pemesanan', compact('pesan', 'meja'),['pesan'=>$pesan]);
    }

   public function tambahpesan(Request $Request){
        $pesan = DB::table('pesanan') ->insert([
            'id_meja'=>$Request->id_meja,
            'tanggal_pesanan'=>$Request->tanggal_pesanan,
            'waktu_mulai'=>$Request->waktu_mulai,
            'waktu_selesai'=>$Request->waktu_selesai,
            'total_biaya'=>$Request->total_biaya,
            'nama_pemesanan'=>$Request->nama_pemesanan,
        ]);
        return redirect('/karyawan/pemesanan');
    }
    public function editpemesanan(Request $Request){
        $pesan = DB::table('pesanan')  -> where('id_pesanan', $Request->id_pesanan) ->update([
            'id_pesanan'=>$Request->id_pesanan,
            'id_meja'=>$Request->id_meja,
            'nama_pemesanan'=>$Request->nama_pemesanan,
            'status'=>$Request->status,
            'status_main'=>$Request->status_main,
            'keterangan'=>$Request->keterangan,
        ]);
        return redirect('/karyawan/pemesanan');
    }
    public function hapuspesanan($id_pesanan){
        $pesan = DB::table('pesanan') ->where('id_pesanan', $id_pesanan) ->delete();
        return redirect('/karyawan/pemesanan');
    }
}