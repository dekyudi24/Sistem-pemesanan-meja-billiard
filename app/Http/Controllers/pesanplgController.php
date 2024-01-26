<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DateTime;
use App\Models\Pembayaran;
use App\Models\Pesanan;

class pesanplgController extends Controller
{
    public function pesanan(){
        $pesan = Pesanan::orderBy('id_pesanan', 'asc')->get();
        // Collect the IDs of the retrieved records
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
        return view('/pemesanan', compact('pesan', 'meja'));
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
        return redirect('/pemesanan')
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
        return redirect('/pemesanan')
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
        return redirect('/pemesanan')
            ->withErrors(["Meja ini sudah dipesan pada jam tersebut."]);
    }
    // Allow booking for different dates
    if ($existingBookingsOnDifferentDate > 0) {
        // Proceed with the booking
    }
    // Insert the new booking into the database
    // $pesan = DB::table('pesanan')->insert([
    //     'id_meja' => $input_meja,
    //     'tanggal_pesanan' => $tanggal, // Set the booking date to today
    //     'id_pelanggan' => $request->id_pelanggan,
    //     'nama_pemesanan' => $request->nama_pemesanan,
    //     'waktu_mulai' => $input_waktu_mulai,
    //     'waktu_selesai' => $waktu_selesai,
    //     'total_biaya' => $request->total_biaya,
    //     'dp' => $request->dp,   
    //     'durasi' => $input_durasi,
    // ]);
    $pesan = new Pesanan;
    $pesan->id_meja = $input_meja;
    $pesan->tanggal_pesanan = $tanggal;
    $pesan->id_pelanggan = $request->id_pelanggan;
    $pesan->nama_pemesanan = $request->nama_pemesanan;
    $pesan->waktu_mulai = $request->waktu_mulai;
    $pesan->waktu_selesai = $waktu_selesai;
    $pesan->total_biaya = $request->total_biaya;
    $pesan->dp = $request->dp;
    $pesan->durasi = $request->durasi ;
    $pesan->save();

    $id_pesanan = $pesan->id_pesanan;
    $bayar = new Pembayaran;
    $bayar->id_pesanan = $id_pesanan;
    $bayar->save();
    return redirect('/pemesanan');
}


    public function uploadpesan(Request $Request){
        $pesan = DB::table('pembayaran')-> where('id_pesanan', $Request->id_pesanan) ->update([   
            'bukti_transfer'=>$Request->file('bukti_transfer')->getClientOriginalName(),
            'metode_pembayaran' => $Request->metode_pembayaran,
        ]);
        if ($Request->hasFile('bukti_transfer')) {
            $Request->file('bukti_transfer')->move('img/', 
           $Request->file('bukti_transfer')->getClientOriginalName());
            }
        return redirect('/pemesanan');
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
        return view('/pemesanan', compact('pesan', 'meja'),['pesan' => $pesan]);
    }
    
}