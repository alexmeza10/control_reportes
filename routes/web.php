<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Rutas públicas (no requieren autenticación)
|--------------------------------------------------------------------------
*/

// Login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas protegidas por autenticación
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Menú principal
    Route::get('/menu', [DashboardController::class, 'index'])->name('menu');

    // Perfil de usuario
    Route::get('/perfil', [DashboardController::class, 'adminuser'])->name('profile.adminuser');
    Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('password.update');

    // Administración de reportes
    Route::get('/newreport', [DashboardController::class, 'newreport'])->name('report.newreport');
    Route::get('/adminreport', [DashboardController::class, 'adminreport'])->name('report.adminreport');
    Route::get('/report', [ReportController::class, 'report'])->name('report.viewreport');

    // Subida de evidencias
    Route::post('/upload-evidencias', [FileController::class, 'upload'])->name('files.upload');
});
