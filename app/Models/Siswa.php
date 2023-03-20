<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama',
        // 'barcode',
        // 'kelas_id',
        'kelas',
        'pendamping',
        'jenis_kelamin',
        // 'foto_barcode'
    ];

    public function registrasi()
    {
        return $this->hasOne(Registrasi::class);
    }
}
