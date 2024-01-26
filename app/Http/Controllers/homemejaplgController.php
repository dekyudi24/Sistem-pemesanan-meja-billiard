<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Meja;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;


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

    public function jadwal($id_meja){
        $meja = Meja::find($id_meja);
        if($meja){
            $dates = [];
            $startDate = now();
            $endDate = $startDate->copy()->endOfYear()->month(12)->day(31);
            $times = [
                '00:00','01:00','02:00','11:00', '12:00', '13:00', '14:00', '15:00',
                '16:00', '17:00', '18:00', '19:00', '20:00',
                '21:00', '22:00', '23:00'
            ];
            $pesanan = DB::table('pesanan')
                ->where('id_meja', $id_meja)
                ->where('status','Valid')
                ->whereBetween('tanggal_pesanan', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                // ->where(function ($query) use ($startDate, $endDate) {
                //     $query->where('waktu_mulai', '<=', $endDate->format('H:i'))
                //         ->where('waktu_selesai', '>=', $startDate->format('H:i'));
                // })
                ->get();
            //dd($pesanan);
            return view('jadwal', compact('meja', 'pesanan', 'dates', 'times'));
        }else{
            return view('jadwal');
        }
            
    }
    
}