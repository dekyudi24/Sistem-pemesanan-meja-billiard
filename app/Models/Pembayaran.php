<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = [
        'id_pesanan',
        'metode_pembayaran',
        'bukti_transfer',
        // Tambahkan atribut lainnya sesuai kebutuhan
    ];

    public function pesanan()
    {
        return $this->hasOne(Pesanan::class, 'id_pesanan' ,'id_pesanan');
    }
}
