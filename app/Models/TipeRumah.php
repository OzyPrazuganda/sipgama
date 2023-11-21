<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeRumah extends Model
{
    use HasFactory;
    protected $table = 'tipe_rumah';

    protected $fillable = [
        'nomor_tipe',
        'keterangan',
        'biaya',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function rumah()
    {
        return $this->hasMany(Rumah::class);
    }
}
