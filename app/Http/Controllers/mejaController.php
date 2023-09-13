<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;


class mejaController extends Controller
{
    public function manajemenmeja(){
        $meja = DB::table('meja_billiard')
        ->orderBy('no_meja','asc')
        ->get();
        return view('/admin/editmeja',['meja'=>$meja]);

    
    }
    public function tambahmeja(Request $Request){
        $meja = DB::table('meja_billiard') ->insert([
            'id_meja'=>$Request->id_meja,
            'no_meja'=>$Request->no_meja,
            'lantai'=>$Request->lantai,
            'status'=>$Request->status,
        ]);
        return redirect('/admin/editmeja');
    }
    public function hapusmeja($id_meja){
        $users = DB::table('meja_billiard') ->where('id_meja', $id_meja) ->delete();
        return redirect('/admin/editmeja');
    }

    public function editmeja(Request $Request){
        $meja = DB::table('meja_billiard') -> where('id_meja', $Request->id_meja) ->update([
            'id_meja'=>$Request->id_meja,
            'no_meja'=>$Request->no_meja,
            'lantai'=>$Request->lantai,
            'status'=>$Request->status,
        ]); 
        return redirect('/admin/editmeja');
    }

}