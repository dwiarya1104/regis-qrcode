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

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
    // Route::get('/create-siswa', [SiswaController::class, 'create'])->name('admin.create.siswa');
    // Route::post('/store-siswa', [SiswaController::class, 'store'])->name('admin.store.siswa');
    Route::post('/siswa/import_excel', [SiswaController::class, 'import'])->name('admin.import.siswa');
    Route::get('/siswa/pdf', [SiswaController::class, 'pdf'])->name('admin.siswa.pdf');

    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('admin.registrasi');
    Route::get('/scan', [RegistrasiController::class, 'scan'])->name('admin.scan');
    Route::post('/submit-preview', [RegistrasiController::class, 'submit_preview'])->name('admin.submit-preview');
    Route::get('/preview/{barcode}', [RegistrasiController::class, 'preview'])->name('admin.preview');
});



Auth::routes();

Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('admin.scan');
    }
    return redirect('/login');
});

Route::get('/home', function () {
    if (Auth::user()) {
        return redirect()->route('admin.scan');
    }
    return redirect('/login');
});
