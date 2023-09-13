<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Hash;

class regisController extends Controller
{
        public function regis(Request $Request){
            $user = DB::table('users') ->insert([
                'id'=>$Request->id,
                'username'=>$Request->username,
                'password'=>Hash::make($Request->password),
                'nama'=>$Request->nama,
                'alamat'=>$Request->alamat,
                'no_tlpn'=>$Request->no_tlpn,
                'role'=>$Request->role,
            ]);
        return redirect('/login');
    }
}