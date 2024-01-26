<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'meja_billiard';
    protected $primaryKey = 'id_meja'; 
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_meja' ,'id_meja');
    }
}
