<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/home', [IndexController::class, 'home']);

Route::prefix('login', function(){
    Route::post('/admin', [IndexController::class, 'loginAdmin']);
    Route::post('/siswa', [IndexController::class, 'loginSiswa']);
    Route::post('/guru', [IndexController::class, 'loginGuru']);
});

Route::get('/logout', [IndexController::class, 'logout']);

// simplified
// Route::resource('/guru', [GuruController::class]);

// based on module
Route::prefix('/guru')->group(function() {
    Route::get('/index', [GuruController::class, 'index']);
    Route::get('/create', [GuruController::class, 'create']);
    Route::get('/store', [GuruController::class, 'store']);
    Route::get('/edit/{guru}', [GuruController::class, 'edit']);
    Route::get('/update/{guru}', [GuruController::class, 'update']);
    Route::get('/destroy/{guru}', [GuruController::class, 'destroy']);
});

Route::prefix('/jurusan')->group(function() {
    Route::get('/index', [JurusanController::class, 'index']);
    Route::get('/create', [JurusanController::class, 'create']);
    Route::get('/store', [JurusanController::class, 'store']);
    Route::get('/edit/{jurusan}', [JurusanController::class, 'edit']);
    Route::get('/update/{jurusan}', [JurusanController::class, 'update']);
    Route::get('/destroy/{jurusan}', [GuruController::class, 'destroy']);
});

Route::prefix('/mapel')->group(function() {
    Route::get('/index', [MapelController::class, 'index']);
    Route::get('/create', [MapelController::class, 'create']);
    Route::get('/store', [MapelController::class, 'store']);
    Route::get('/edit/{mapel}', [MapelController::class, 'edit']);
    Route::get('/update/{mapel}', [MapelController::class, 'update']);
    Route::get('/destroy/{mapel}', [GuruController::class, 'destroy']);
});

Route::prefix('/kelas')->group(function() {
    Route::get('/index', [KelasController::class, 'index']);
    Route::get('/create', [KelasController::class, 'create']);
    Route::get('/store', [KelasController::class, 'store']);
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::get('/update/{kelas}', [KelasController::class, 'update']);
    Route::get('/destroy/{kelas}', [GuruController::class, 'destroy']);
});

Route::prefix('/siswa')->group(function() {
    Route::get('/index', [SiswaController::class, 'index']);
    Route::get('/create', [SiswaController::class, 'create']);
    Route::get('/store', [SiswaController::class, 'store']);
    Route::get('/edit/{siswa}', [SiswaController::class, 'edit']);
    Route::get('/update/{siswa}', [SiswaController::class, 'update']);
    Route::get('/destroy/{siswa}', [GuruController::class, 'destroy']);
});

Route::prefix('/mengajar')->group(function() {
    Route::get('/index', [MengajarController::class, 'index']);
    Route::get('/create', [MengajarController::class, 'create']);
    Route::get('/store', [MengajarController::class, 'store']);
    Route::get('/edit/{mengajar}', [MengajarController::class, 'edit']);
    Route::get('/update/{mengajar}', [MengajarController::class, 'update']);
    Route::get('/destroy/{mengajar}', [GuruController::class, 'destroy']);
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
