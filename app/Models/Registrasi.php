<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jam_hadir',
        'siswa_id',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
