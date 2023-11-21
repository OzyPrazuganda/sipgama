<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = 'inventaris';

    protected $fillable = [
        'nama_barang',
        'jumlah',
        'kondisi',
        'keterangan',
    ];

    protected $hidden = [
        'id',
        'updated_at',
        'created_at',
    ];
}
