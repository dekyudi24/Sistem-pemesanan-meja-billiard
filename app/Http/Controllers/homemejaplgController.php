<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;


class homemejaplgController extends Controller
{
    public function lantai1plg(){
        $pesan = DB::table('pesanan') ->get();
        $meja = DB::table('meja_billiard') 
        ->orderBy('no_meja','desc')
        ->get();
        return view('/dashboard', compact('pesan', 'meja'),['meja'=>$meja]);
    }
    public function tambahpesan(Request $Request){
        $validator = Validator::make($Request->all(), [
        
            'id_meja' => 'required',
            'waktu_mulai' => [
                'required',
                Rule::unique('pesanan', 'waktu_mulai')->where(function ($query) use ($Request) {
                    return $query->where('id_meja', $Request->id_meja);
                }),
            ],
        ], [
            'waktu_mulai.unique' => 'Waktu mulai sudah digunakan untuk nomor meja ini.',
        ]);
        // Jalankan validasi
        if ($validator->fails()) {
            return redirect('/pemesanan')
                ->withErrors($validator)
                ->withInput();
        }
        $pesan = DB::table('pesanan') ->insert([
            'id_meja'=>$Request->id_meja,
            'tanggal_pesanan'=>$Request->tanggal_pesanan,
            'id_pelanggan'=>$Request->id_pelanggan,
            'nama_pemesanan'=>$Request->nama_pemesanan,
            'waktu_mulai'=>$Request->waktu_mulai,
            'total_biaya'=>$Request->total_biaya,
            'dp'=>$Request->dp,
            'metode_pembayaran'=>$Request->metode_pembayaran,
            'bukti_transfer'=>$Request->file('bukti_transfer')->getClientOriginalName(),
            'durasi'=>$Request->durasi,
        ]);
        if ($Request->hasFile('bukti_transfer')) {
            $Request->file('bukti_transfer')->move('img/', 
           $Request->file('bukti_transfer')->getClientOriginalName());
            }
        return redirect('/pemesanan');
    }

    /*public function lantai1plg(){
        $meja = DB::table('meja_billiard')
        ->orderBy('no_meja','desc')
        ->get();
        return view('/dashboard',['meja'=>$meja]);*/

    
    
    public function lantai2plg(){
        $meja = DB::table('meja_billiard')
        ->orderBy('no_meja','desc')
        ->get();
        return view('/dashlantai2',['meja'=>$meja]);

    
    }

    public function lantai3plg(){
        $meja = DB::table('meja_billiard')
        ->orderBy('no_meja','desc')
        ->get();
        return view('/dashlantai3',['meja'=>$meja]);

    
    }
    
}