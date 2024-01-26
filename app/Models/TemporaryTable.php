<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryTable extends Model
{
    use HasFactory;
    protected $table = 'temporary_tables';

    // Tambahkan atribut fillable atau guarded sesuai kebutuhan
    protected $fillable = [
        'id_meja',
        'waktu_mulai',
        'waktu_selesai',
        'tanggal',
        'durasi',
        // Tambahkan atribut lainnya sesuai kebutuhan
    ];
}
