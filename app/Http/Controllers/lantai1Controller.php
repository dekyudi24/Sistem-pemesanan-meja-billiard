<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;


class lantai1Controller extends Controller
{
    public function lantai1(){
        $meja = DB::table('meja_billiard')
        ->orderBy('no_meja','desc')
        ->get();
        return view('/admin/dashlantai1',['meja'=>$meja]);

    
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
}