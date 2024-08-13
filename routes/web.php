<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::post('/form-submit', [adminController::class, 'submit'])->name('form.submit');
Route::get('/admin', [adminController::class, 'index'])->name('admin.submissions');
Route::get('/thankyou', [adminController::class, 'thankYou'])->name('thankyou');
