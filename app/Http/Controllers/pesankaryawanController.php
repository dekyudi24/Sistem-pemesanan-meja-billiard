<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Pesanan;
use App\Models\Pembayaran;

class pesankaryawanController extends Controller
{
    public function pemesanan(Request $request){
        $pesan = Pesanan::where(function($query) {
            $query->whereNull('status_main')
                  ->orWhere('status_main','Booking')
                  ->orWhere('status_main','Main');
        })
        ->orderBy('id_pesanan','asc')
        ->get(); 
        $pesanIds = $pesan->pluck('id_pesanan')->toArray();

            // Fetch related data (pembayaran) using a separate query
            $pembayaran = DB::table('pembayaran')
            ->whereIn('id_pesanan', $pesanIds)
            ->get()
            ->groupBy('id_pesanan')
            ->map(function ($group) {
                return $group->first();
            });

            // Now, manually associate the related data with the main data
            foreach ($pesan as $p) {
                $p->pembayaran = $pembayaran[$p->id_pesanan] ?? null;
            }
        $meja = DB::table('meja_billiard')
        ->where('status','Tersedia') 
        ->orderBy('no_meja','asc')
        ->get();
        // $cari = $request->cari;
        // $pesan = DB::table('pesanan')
        // ->where('id_pesanan','like',"%".$cari."%")->paginate();
    return view('/karyawan/pemesanan', compact('pesan', 'meja'),['pesan'=>$pesan]);
    }

    public function tambahpesan(Request $request)
{
    $validator = Validator::make($request->all(), [
        'waktu_mulai' => 'required|date_format:H:i',
        'durasi' => 'required|integer|min:1',
    ], [
        'waktu_mulai.date_format' => 'Format waktu mulai tidak valid (HH:mm).',
        'durasi.min' => 'Durasi harus minimal 1 jam.',
    ]);

    if ($validator->fails()) {
        return redirect('/karyawan/pemesanan')
            ->withErrors($validator)
            ->withInput();
    }

    $input_meja = $request->input('id_meja');
    $input_waktu_mulai = $request->input('waktu_mulai');
    $input_durasi = $request->input('durasi');
    $waktu_selesai = date('H:i', strtotime("$input_waktu_mulai +$input_durasi hours"));
    $tanggal = date('Y-m-d');
    // Check if the requested time slot is within the opening hours (11:00 - 15:00)
    $opening_time = '11:00';
    $closing_time = '02:00';
    if ($input_waktu_mulai < $opening_time && $waktu_selesai > $closing_time) {
        return redirect('/karyawan/pemesanan')
            ->withErrors(["Maaf, toko tutup pada jam tersebut."]);
    }

    // Check for overlapping bookings for the selected table
    $existingBookings = DB::table('pesanan')
    ->where('id_meja', $input_meja)
    ->where('tanggal_pesanan', '=', $tanggal)
    ->where(function ($query) use ($input_waktu_mulai, $waktu_selesai) {
        $query->where(function ($q) use ($input_waktu_mulai, $waktu_selesai) {
            $q->where('waktu_mulai', '<', $waktu_selesai)
                ->where('waktu_selesai', '>', $input_waktu_mulai);
        });
    })
    ->count();
    // Check for existing bookings on different dates
    $existingBookingsOnDifferentDate = DB::table('pesanan')
        ->where('id_meja', $input_meja)
        ->where('tanggal_pesanan', '!=', $tanggal)
        ->where(function ($query) use ($input_waktu_mulai, $waktu_selesai) {
            $query->where(function ($query) use ($input_waktu_mulai, $waktu_selesai) {
                $query->whereBetween('waktu_mulai', [$input_waktu_mulai, $waktu_selesai]);
            })->orWhere(function ($query) use ($input_waktu_mulai, $waktu_selesai) {
                $query->whereBetween(DB::raw("DATE_ADD(waktu_mulai, INTERVAL durasi HOUR)"), [$input_waktu_mulai, $waktu_selesai]);
            });
        })
        ->count();

    if ($existingBookings > 0) {
        return redirect('/karyawan/pemesanan ')
            ->withErrors(["Meja ini sudah dipesan pada jam tersebut."]);
    }

    // Allow booking for different dates
    if ($existingBookingsOnDifferentDate > 0) {
        // Proceed with the booking
    }

    // Insert the new booking into the database
    $pesan = DB::table('pesanan')->insert([
        'id_meja' => $input_meja,
        'tanggal_pesanan' => $tanggal, // Set the booking date to today
        'id_pelanggan' => $request->id_pelanggan,
        'nama_pemesanan' => $request->nama_pemesanan,
        'waktu_mulai' => $input_waktu_mulai,
        'waktu_selesai' => $waktu_selesai,
        'total_biaya' => $request->total_biaya,
        'dp' => $request->dp,
        'durasi' => $input_durasi,
        'status' => 'Valid',
    ]);

    if ($request->hasFile('bukti_transfer')) {
        $request->file('bukti_transfer')->move('img/', $request->file('bukti_transfer')->getClientOriginalName());
    }

    return redirect('/karyawan/pemesanan');
}
//    public function tambahpesan(Request $Request){
//     $input_waktu_mulai = $Request->input('waktu_mulai');
//     $input_durasi = $Request->input('durasi');
//     $waktu_selesai = date('H:i', strtotime("$input_waktu_mulai +$input_durasi hours"));
//     $tanggal = date('Y-m-d');
//         $pesan = DB::table('pesanan') ->insert([
//             'id_meja'=>$Request->id_meja,
//             'tanggal_pesanan'=>$Request->tanggal_pesanan,
//             'durasi' => $Request->durasi,
//             'waktu_mulai'=>$Request->waktu_mulai,
//             'waktu_selesai'=>$waktu_selesai,
//             'total_biaya'=>$Request->total_biaya,
//             'nama_pemesanan'=>$Request->nama_pemesanan,
        
//         ]);
        
//         return redirect('/karyawan/pemesanan');
//     }
    public function editpemesanan(Request $Request){
        $pesan = DB::table('pesanan')  -> where('id_pesanan', $Request->id_pesanan) ->update([
            'id_pesanan'=>$Request->id_pesanan,
            'status'=>$Request->status,
            'status_main'=>$Request->status_main,
            'keterangan'=>$Request->keterangan,
        ]);
        return redirect('/karyawan/pemesanan');
    }
    public function hapuspesanan($id_pesanan){
        $pembayaran = Pembayaran::where('id_pesanan', $id_pesanan)->delete();
        $pesan = DB::table('pesanan') ->where('id_pesanan', $id_pesanan) ->delete();
        return redirect('/karyawan/pemesanan');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $pesan = DB::table('pesanan')
        ->where('id_pesanan','like',"%".$cari."%")->get();
        // dd($pesan);
        $pesanIds = $pesan->pluck('id_pesanan')->toArray();

            // Fetch related data (pembayaran) using a separate query
            $pembayaran = DB::table('pembayaran')
            ->whereIn('id_pesanan', $pesanIds)
            ->get()
            ->groupBy('id_pesanan')
            ->map(function ($group) {
                return $group->first();
            });

            // Now, manually associate the related data with the main data
            foreach ($pesan as $p) {
                $p->pembayaran = $pembayaran[$p->id_pesanan] ?? null;
            }
        $meja = DB::table('meja_billiard')
        ->where('status','Tersedia') 
        ->orderBy('no_meja','asc')
        ->get();
        return view('karyawan.pemesanan', compact('pesan', 'meja'),['pesan' => $pesan]);
    }
}