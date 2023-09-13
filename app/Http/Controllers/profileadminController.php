<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Hash;

class profileadminController extends Controller
{
    public function profileadmin(){
        $user = DB::table('users') ->get();
        return view('/admin/profil',['user'=>$user]);
    }
    public function editprofil(Request $Request){
        $user = DB::table('users') -> where('id', $Request->id) ->update([
            'id'=>$Request->id,
            'username'=>$Request->username,
            'nama'=>$Request->nama,
            'alamat'=>$Request->alamat,
            'no_tlpn'=>$Request->no_tlpn,
            'role'=>$Request->role,
            'foto'=>$Request->file('foto')->getClientOriginalName(),
        ]); 
        if ($Request->hasFile('foto')) {
            $Request->file('foto')->move('img/', 
           $Request->file('foto')->getClientOriginalName());
            }
        return redirect('/admin/profil');
    }
    public function editpassword(Request $Request){
        $user = DB::table('users') -> where('id', $Request->id) ->update([
            'id'=>$Request->id,
            'password'=>Hash::make($Request->password),
        ]); 
        return redirect('/admin/profil');
    }
    public function lihat(Request $Request){
        $user = DB::table('users') -> where('id', $Request->id) ->update([
            'id'=>$Request->id,
            'foto'=>$Request->foto,
        ]); 
        return redirect('/admin/profil');
    }
}