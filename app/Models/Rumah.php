<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;
    protected $table = 'rumah';

    protected $fillable = [
        'nomor_rumah',
        'blok',
        'status',
        'tipe_rumah_id'
    ];

    protected $hidden = [
        'id',
        'updated_at',
        'created_at',
    ];

    public function tipe_rumah()
    {
        return $this->belongsTo(TipeRumah::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
