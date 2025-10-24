<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/', [RegistrationController::class, 'index'])->name('registrations.index');
Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
Route::post('/registrations/{registration}/toggle-priority', [RegistrationController::class, 'togglePriority'])->name('registrations.toggle-priority');
