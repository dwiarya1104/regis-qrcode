<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Kelas;
use App\Models\Siswa;
use GdImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Milon\Barcode\Facades\DNS2DFacade;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::get();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::get();
        return view('admin.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $kelas = Kelas::where('id', $request->kelas_id)->first();
        $jurusan = explode(" ", $kelas->kelas);
        $format = $jurusan[1] . '/' . $request->nama . '-' . $kelas->kelas . '.' . 'png';
        $filename = str_replace(" ", "", $format);

        $siswa = Siswa::create([
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'barcode' => 'SMKN10' . rand(100000, 999999),
            'pendamping' => $request->pendamping,
            'foto_barcode' => $filename
        ]);
        $store_barcode = Storage::disk('public')->put($filename, base64_decode(DNS2DFacade::getBarcodePNG("$siswa->barcode", "QRCODE")));
    }

    public function import(Request $request)
    {

        Excel::import(new SiswaImport,  $request->file('file'));
        return redirect()->route('admin.siswa');
    }
}
