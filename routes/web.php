<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\SiswaController;
use App\Models\Barcode;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\Facades\DNS2DFacade;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
    Route::get('/create-siswa', [SiswaController::class, 'create'])->name('admin.create.siswa');
    Route::post('/store-siswa', [SiswaController::class, 'store'])->name('admin.store.siswa');
    
    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('admin.registrasi');
    Route::get('/scan', [RegistrasiController::class, 'scan'])->name('admin.scan');
    Route::post('/submit-preview', [RegistrasiController::class, 'submit_preview'])->name('admin.submit-preview');
    Route::get('/preview/{barcode}', [RegistrasiController::class, 'preview'])->name('admin.preview');
    // Route::get('/absen', function () {
    //     return view('absen');
    // });

    // Route::post('/validasi', function (Request $request) {
    //     $barcode = Barcode::where('barcode', $request->qr_code)->first();
    //     Storage::disk('public')->put('test1.png', base64_decode(DNS2DFacade::getBarcodePNG("4", "QRCODE", 20, 20, array(1, 1, 1))));

    //     $presensi = Presensi::create([
    //         'user_id' => Auth::user()->id,
    //         'status' => 'hadir',
    //         'barcode_id' => $barcode->id
    //     ]);
    //     return response()->json([
    //         'message' => 'tes',
    //         'status' => 200
    //     ]);
    // })->name('validasi');
    // Route::get('kelas', [KelasController::class, 'index'])->name('kelas');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
