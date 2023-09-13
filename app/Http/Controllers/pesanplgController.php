<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class pesanplgController extends Controller
{
    public function pesanan(){
        $pesan = DB::table('pemesanan') ->get();
        $meja = DB::table('meja_billiard') 
        ->orderBy('no_meja','asc')
        ->get();
        return view('/pemesanan', compact('pesan', 'meja'),['pesan'=>$pesan]);
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

    public function uploadpesan(Request $Request){
        $pesan = DB::table('pesanan')  -> where('id_pesanan', $Request->id_pesanan) ->update([
            'id_pesanan'=>$Request->id_pesanan,
            'bukti_transfer'=>$Request->file('bukti_transfer')->getClientOriginalName(),
        ]);
        if ($Request->hasFile('bukti_transfer')) {
            $Request->file('bukti_transfer')->move('img/', 
           $Request->file('bukti_transfer')->getClientOriginalName());
            }
        return redirect('/pemesanan');
    }
    
}