<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\Controller;


Route::get('/', [Controller::class, 'showFormHome']);

Route::prefix('/admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showFormLogin'])->name("loginAdmin");
    Route::post('/login', [AdminLoginController::class, 'doLogin'])->name('doLogin');
});

// Route::prefix('/client')->group(function() {
//     Route::get('/login', [ClientLoginController::class, 'showFormLogin'])->name("loginClient");
//     Route::post('/login', [ClientLoginController::class, 'doLogin']);
//     Route::get('/register', [ClientRegisterController::class]);
// });


