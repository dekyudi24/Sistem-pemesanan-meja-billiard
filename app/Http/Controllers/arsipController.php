<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\Pesanan;

class arsipController extends Controller
{
    public function arsip(Request $Request){
        $arsip = Pesanan::where('status_main','Selesai')->paginate();
        $meja = DB::table('meja_billiard') 
        ->orderBy('no_meja', 'desc')
        ->get();
        return view('/admin/arsip', compact('arsip', 'meja'),['arsip'=>$arsip]);
    }
    
}