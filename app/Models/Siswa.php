<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'barcode',
        'kelas_id',
        'pendamping',
        'foto_barcode'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function registrasi()
    {
        return $this->hasOne(Registrasi::class);
    }
}
