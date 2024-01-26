<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == "Admin") {
            return redirect('/admin/dashlantai1');
        } else if ($role == "Karyawan") {
            return redirect('/karyawan/dashlantai1');
        } else if ($role == "Pengguna") {
            return redirect('dashboard');
        } else {
            return redirect()->to('logout');
        } 
    }
}
