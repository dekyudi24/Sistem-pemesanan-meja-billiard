<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function lihatpengguna(){
        $user = DB::table('users') ->get();
        return view('/admin/pengguna',['user'=>$user]);
    }

    public function tambahpengguna(Request $Request){
        $user = DB::table('users') ->insert([
            'id'=>$Request->id,
            'username'=>$Request->username,
            'password'=>Hash::make($Request->password),
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
        return redirect('/admin/pengguna');
    }
    public function hapuspengguna($id){
        $users = DB::table('users') ->where('id', $id) ->delete();
        return redirect('/admin/pengguna');
    }

    public function editpengguna(Request $Request){
        $user = DB::table('users') -> where('id', $Request->id) ->update([
            'id'=>$Request->id,
            'username'=>$Request->username,
            'nama'=>$Request->nama,
            'alamat'=>$Request->alamat,
            'no_tlpn'=>$Request->no_tlpn,
            'role'=>$Request->role,
        ]);
        return redirect('/admin/pengguna');
    }

    public function editpassword(Request $Request){
        $user = DB::table('users') -> where('id', $Request->id) ->update([
            'id'=>$Request->id,
            'password'=>Hash::make($Request->password),
        ]); 
        return redirect('/admin/pengguna');
    }
}