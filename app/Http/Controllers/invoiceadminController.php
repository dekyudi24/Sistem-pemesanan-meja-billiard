<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;


class invoiceadminController extends Controller
{
   public function invoice($id){
        $pesan = DB::table('pesanan') ->where('id_pesanan', $id)->get();
        $meja = DB::table('meja_billiard') 
        ->orderBy('no_meja','asc')
        ->get();
        return view('/invoice', compact('pesan', 'meja'),['pesan'=>$pesan]);
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
}