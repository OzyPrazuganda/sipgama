<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;
    protected $table = 'metode_pembayaran';

    protected $fillable = [
        'nomor_pembayaran',
        'nama',
        'metode_pembayaran',
    ];

    protected $hidden = [
        'id',
        'updated_at',
        'created_at',
    ];

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
