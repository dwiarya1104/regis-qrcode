<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Kelas;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use GdImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Milon\Barcode\Facades\DNS2DFacade;
use PDF;

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

    // public function store(Request $request)
    // {
    //     $kelas = Kelas::where('id', $request->kelas_id)->first();
    //     $jurusan = explode(" ", $kelas->kelas);
    //     $format = $jurusan[1] . '/' . $request->nama . '-' . $kelas->kelas . '.' . 'png';
    //     $filename = str_replace(" ", "", $format);

    //     $siswa = Siswa::create([
    //         'nama' => $request->nama,
    //         'kelas_id' => $request->kelas_id,
    //         'barcode' => 'SMKN10' . rand(100000, 999999),
    //         'pendamping' => $request->pendamping,
    //         'foto_barcode' => $filename
    //     ]);
    //     $store_barcode = Storage::disk('public')->put($filename, base64_decode(DNS2DFacade::getBarcodePNG("$siswa->barcode", "QRCODE")));
    // }

    public function import(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('file'));
        $this->pdf();
        return redirect()->route('admin.siswa')->with('status', 'success')->with('message', 'Berhasil Mengimport Siswa');
    }

    public function pdf()
    {
        $siswas = Siswa::all();
        foreach ($siswas as $siswa) {
            $format = str_replace(" ", "_", $siswa->kelas);

            $filename =  $format . '/QR/' . $siswa->nama . '_' . $siswa->nis . '.png';
            Storage::disk('public')->put($filename, base64_decode(DNS2DFacade::getBarcodePNG($siswa->nis, "QRCODE")));

            $update = $siswa->update([
                'foto_barcode' => $filename
            ]);

            if ($update) {
                $data = [
                    'nama' => $siswa->nama,
                    'nis' => $siswa->nis,
                    'kelas' => $siswa->kelas,
                    'foto_barcode' => $siswa->foto_barcode,
                ];

                $pdfName = $format . '/' . $siswa->nama . '_' . $siswa->nis . '.pdf';

                $pdf = app('dompdf.wrapper');
                $hasil = $pdf->loadView('admin.siswa.qr', $data);

                $content = $pdf->download()->getOriginalContent();
                Storage::put($pdfName, $content);

                $siswa->update([
                    'tiket' => $pdfName
                ]);
            }
        }
    }
}
