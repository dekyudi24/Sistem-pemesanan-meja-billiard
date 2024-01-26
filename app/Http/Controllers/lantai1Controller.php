<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\Meja;
use App\Models\Pesanan;

class lantai1Controller extends Controller
{
    public function lantai1(){
        $meja = Meja::orderBy('no_meja','desc')
        ->get();
        $meja1 = Meja::orderBy('no_meja', 'desc')
        ->first();
        $pesanan = Pesanan::select('*')->get();
       

        return view('/admin/dashlantai1',['meja' => $meja, 'meja1' => $meja1 , 'pesanan' => $pesanan]);

    
    }

    public function lantai2(){
        $meja = DB::table('meja_billiard')
        ->orderBy('no_meja','desc')
        ->get();
        return view('/admin/dashlantai2',['meja'=>$meja]);

    
    }

    public function lantai3(){
        $meja = DB::table('meja_billiard')
        ->orderBy('no_meja','desc')
        ->get();
        return view('/admin/dashlantai3',['meja'=>$meja]);

    
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
            return view('admin.jadwal', compact('meja', 'pesanan', 'dates', 'times'));
        }else{
            return view('admin.jadwal');
        }
            
    }
    public function laporan(){
        return view('admin.laporan');
    }

    public function cetaklaporan($tglawal, $tglakhir) {
        $meja = Meja::orderBy('no_meja', 'ASC')->get();
    $laporan = [];
    $totalHargaSemuaTanggal = 0;
    //$totalJamSemuaTanggal = 0;

    $dates = [];
    $startDate = \Carbon\Carbon::parse($tglawal);
    $endDate = \Carbon\Carbon::parse($tglakhir);

    while ($startDate->lte($endDate)) {
        $dates[] = $startDate->toDateString();
        $startDate->addDay();
    }

    // Mengumpulkan data pesanan dan menghitung total durasi
    $pesanan = DB::table('pesanan')
        ->whereDate('tanggal_pesanan', '>=', $tglawal)
        ->whereDate('tanggal_pesanan', '<=', $tglakhir)
        ->get();

    foreach ($dates as $date) {
        foreach ($meja as $mj) {
            $totalJam = 0;
            $totalHarga = 0;

            // Iterasi melalui pesanan untuk menghitung total durasi per meja
            foreach ($pesanan as $p) {
                if ($p->tanggal_pesanan === $date && $p->id_meja == $mj->id_meja) {
                    $totalJam += $p->durasi;
                    $totalHarga += $p->total_biaya;
                    $totalHargaSemuaTanggal += $p->total_biaya;
                }
            }

            // Menyimpan data total jam ke dalam laporan
            $laporan[] = [
                'meja' => $mj,
                'tanggal' => $date,
                'totalJam' => $totalJam,
                'totalHarga' => $totalHarga,
                
            ];
        }
    }
        //dd($laporan);
        return view('admin.cetak-laporan-pertanggal', compact('laporan', 'meja', 'dates','totalHargaSemuaTanggal'));
    }
    
}