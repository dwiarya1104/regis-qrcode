<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        $registrasi = Registrasi::with('siswa')->get();
        return view('admin.registrasi.index', compact('registrasi'));
    }
    public function scan()
    {
        return view('admin.scan');
    }

    public function preview($barcode)
    {
        $preview = Siswa::where('nis', $barcode)->first();
        return view('admin.preview', compact('preview'));
    }

    public function submit_preview(Request $request)
    {
        $submit = Registrasi::create([
            'siswa_id' => $request->siswa_id,
            'status' => 'hadir',
            'jam_hadir' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.scan')->with('success', 'Berhasil Regis');
    }
}
