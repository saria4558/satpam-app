<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'tamus';

    protected $fillable = [
        'nama',
        'alamat',
        'keperluan',
        'telepon',
        'dokumentasi',
        'status',
        'jadwal_kunjungan',
    ];

    public $timestamps = true;
}
