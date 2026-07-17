<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');
Route::get('/bienvenida', fn () => view('landing'))->name('landing');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/chat', fn () => view('chat'))->name('chat');

    Route::get('/bitacora', fn () => view('mood-log'))->name('mood-log.index');

    Route::get('/tamizaje', fn () => view('screening'))->name('screening.index');
    Route::get('/tamizaje/resultado', fn () => view('screening-result'))->name('screening.result');

    Route::get('/bienestar', fn () => view('wellbeing'))->name('wellbeing');
    Route::get('/controles/registrar', fn () => view('log-measurement'))->name('measurements.create');

    Route::get('/urgencia/bebe', fn () => view('urgent-baby'))->name('urgent.baby');
    Route::get('/urgencia/cuidador', fn () => view('urgent-caregiver'))->name('urgent.caregiver');

    Route::get('/perfil', fn () => view('profile'))->name('profile.index');
    Route::get('/perfil/editar', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bebe/registrar', fn () => view('register-baby'))->name('baby.create');
    Route::get('/bebe/editar', fn () => view('edit-baby'))->name('baby.edit');
});

Route::get('/privacidad', fn () => view('privacy'))->name('legal.privacy');
Route::get('/terminos', fn () => view('terms'))->name('legal.terms');
Route::get('/ayuda', fn () => view('help'))->name('help.index');
Route::get('/qr', fn () => view('qr'))->name('qr.index');

require __DIR__.'/auth.php';
