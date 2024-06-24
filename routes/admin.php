<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\AdminLoginController;



Route::prefix('/admin')->middleware('guest')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showFormLogin'])->name("loginAdmin");
    Route::post('/login', [AdminLoginController::class, 'doLogin'])->name('doLogin');
    Route::get('/register', [AdminLoginController::class, 'showFormRegister'])->name('showFormRegister');
    Route::post('/register', [AdminLoginController::class, 'doRegister'])->name('doRegister');
});

Route::get('/home', function () {
    return view('admin.layouts.app');
});
