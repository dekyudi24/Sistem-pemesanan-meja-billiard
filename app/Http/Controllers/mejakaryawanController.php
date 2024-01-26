<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Meja;
use Illuminate\support\facades\DB;


class mejakaryawanController extends Controller
{
    public function manajemenmeja(){
        $meja = DB::table('meja_billiard') 
        ->orderBy('no_meja','asc')
        ->get();
        return view('/karyawan/editmeja',['meja'=>$meja]);

    
    }
    public function tambahmeja(Request $Request){
        $meja = DB::table('meja_billiard') ->insert([
            'id_meja'=>$Request->id_meja,
            'no_meja'=>$Request->no_meja,
            'lantai'=>$Request->lantai,
            'status'=>$Request->status,
        ]);
        return redirect('/karyawan/editmeja');
    }
    public function hapusmeja($id_meja){
        $users = DB::table('meja_billiard') ->where('id_meja', $id_meja) ->delete();
        return redirect('/karyawan/editmeja');
    }

    public function editmeja(Request $Request){
        $meja = DB::table('meja_billiard') -> where('id_meja', $Request->id_meja) ->update([
            'id_meja'=>$Request->id_meja,
            'no_meja'=>$Request->no_meja,
            'lantai'=>$Request->lantai,
            'status'=>$Request->status,
        ]); 
        return redirect('/karyawan/editmeja');
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