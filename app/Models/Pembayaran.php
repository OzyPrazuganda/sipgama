<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_iuran';

    protected $fillable = [
        'bulan',
        'total_bayar',
        'bukti_pembayaran',
        'status',

        'warga_id',
        'rumah_id',
        'metode_pembayaran_id'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function warga()
    {
        return $this->belongsTo(User::class);
    }

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }

    public function metode_pembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class);
    }
}
