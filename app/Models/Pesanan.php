<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';


    protected $primaryKey = 'id_pesanan'; 

    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja' ,'id_meja');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pesanan' ,'id_pesanan');
    }
}
