<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DecretoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UsuarioController;
use App\Models\Decreto;
use Illuminate\Support\Facades\Route;

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
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('usuario', UsuarioController::class)->middleware(['auth', 'verified']);
Route::resource('decreto', DecretoController::class)->middleware(['auth', 'verified']);
Route::resource('admin', AdminController::class)->middleware(['auth', 'verified']);
Route::resource('solicitud',SolicitudController::class)->middleware(['auth', 'verified']);

Route::get('usuario.solicitud', [UsuarioController::class, 'solicitud'])->name('solicitud')->middleware('guest');
Route::post('usuario.solicitudStore', [UsuarioController::class, 'solicitudStore'])->name('solicitudStore')->middleware('guest');

Route::get('decreto.decretoAdd/{id}', [DecretoController::class, 'decretoAdd'])->name('decretoAdd');
Route::get('decreto.maletin', [DecretoController::class, 'maletin'])->name('maletin')->middleware('auth');
Route::get('decreto.borrarMaletin', [DecretoController::class, 'borrarMaletin'])->name('borrarMaletin');
Route::get('usuario.perfil', [UsuarioController::class ,'perfil'])->name('perfil')->middleware('auth');

Route::get('admin.solicitudes', [AdminController::class, 'solicitudes'])->name('solicitudes')->middleware('auth');

Route::get('admin.solicitudDecreto/{id}', [AdminController::class, 'solicitudDecreto'])->name('solicitudDecreto')->middleware('auth');
Route::get('admin.viewsolicituddecreto',[AdminController::class, 'viewSolicitudDecreto'])->name('viewSolicitudDecreto')->middleware('auth');

Route::get('decreto.descargarMaletin', [DecretoController::class, 'descargarMaletin'])->name('descargarMaletin')->middleware('auth');

require __DIR__.'/auth.php';
