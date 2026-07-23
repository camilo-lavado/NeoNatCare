<?php

use App\Http\Controllers\MentalHealthLogController;
use App\Http\Controllers\NewbornController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreeningController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');
Route::get('/bienvenida', fn () => view('landing'))->name('landing');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/chat', fn () => view('chat'))->name('chat');

    Route::get('/bitacora', [MentalHealthLogController::class, 'index'])->name('mood-log.index');
    Route::post('/bitacora', [MentalHealthLogController::class, 'store'])->name('mood-log.store');
    Route::delete('/bitacora/{mental_health_log}', [MentalHealthLogController::class, 'destroy'])->name('mood-log.destroy');

    Route::get('/tamizaje', [ScreeningController::class, 'index'])->name('screening.index');
    Route::post('/tamizaje', [ScreeningController::class, 'store'])->name('screening.store');
    Route::get('/tamizaje/resultado', [ScreeningController::class, 'result'])->name('screening.result');

    Route::get('/bienestar', fn () => view('wellbeing'))->name('wellbeing');
    Route::get('/controles/registrar', fn () => view('log-measurement'))->name('measurements.create');

    Route::get('/urgencia/bebe', fn () => view('urgent-baby'))->name('urgent.baby');
    Route::get('/urgencia/cuidador', fn () => view('urgent-caregiver'))->name('urgent.caregiver');

    Route::get('/perfil', fn () => view('profile'))->name('profile.index');
    Route::get('/perfil/editar', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bebe/registrar', [NewbornController::class, 'create'])->name('baby.create');
    Route::post('/bebe/registrar', [NewbornController::class, 'store'])->name('baby.store');
    Route::get('/bebe/editar', [NewbornController::class, 'edit'])->name('baby.edit');
    Route::patch('/bebe/editar', [NewbornController::class, 'update'])->name('baby.update');
});

Route::get('/privacidad', fn () => view('privacy'))->name('legal.privacy');
Route::get('/terminos', fn () => view('terms'))->name('legal.terms');
Route::get('/ayuda', fn () => view('help'))->name('help.index');
Route::get('/qr', fn () => view('qr'))->name('qr.index');

require __DIR__.'/auth.php';
