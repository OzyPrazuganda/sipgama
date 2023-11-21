<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $table = 'permohonan_surat';

    protected $fillable = [
        'jenis',
        'status',
        'nomor_surat',
        'users_id',
        'file'
    ];

    protected $hidden = [
        'id',
        'updated_at',
        'created_at'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
