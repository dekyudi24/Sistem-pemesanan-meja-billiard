<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;


class arsipController extends Controller
{
    public function arsip(Request $Request){
        $pesan = DB::table('pesanan')  -> where('status_main','Selesai') ->get();
        $meja = DB::table('meja_billiard') 
        ->orderBy('no_meja','asc')
        ->get();
        return view('/admin/arsip', compact('pesan', 'meja'),['pesan'=>$pesan]);
    }
    
}