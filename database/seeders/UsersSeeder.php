<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*username admin :yud123 
    pas admin : admin
    */
    /*username admin :yudi123 
    pas admin : karyawan
    */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'dekyudi',
            'username' => 'pengguna',
            'no_tlpn' => '082296034309',
            'password' => bcrypt('pengguna'),
            'role' => 'Pengguna',
            'foto' => 'b.jpg',
            'alamat' => 'kue',
            'remember_token' => str::random(30),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
