<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\Pesanan;
use App\Models\Pembayaran;

class invoiceadminController extends Controller
{
   public function invoice($id){
        $pesan = Pesanan::find($id);
        return view('admin.invoice', compact('pesan'));
    }
   /*  public function invoice($id){
        $pesan = DB::table('pesanan') ->where('id_pesanan', $id)->get();
        $meja = DB::table('meja_billiard') 
        ->orderBy('no_meja','asc')
        ->get();
        $pdf = \PDF::loadView('/invoice', compact('pesan', 'meja'),['pesan'=>$pesan]);
        $pdf->setPaper('A6', 'portrait');
        return $pdf->download('InvoicePembayaran.pdf');
        
    
    }*/
    public function sturck($id){
        $pesan = Pesanan::find($id);
        return view('admin.struck', compact('pesan'));
    }
}