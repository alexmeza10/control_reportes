<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\CorreoController;



/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

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

    // Administración de reportes del usuario autenticado
    Route::get('/newreport', [ReportController::class, 'newreport'])->name('report.newreport');
    Route::get('/adminreport', [ReportController::class, 'adminreport'])->name('report.adminreport');
    Route::get('/reportes', [ReportController::class, 'index'])->name('report.adminreport');
    Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');
    Route::get('/report/{hashid}/edit', [ReportController::class, 'edit'])->name('report.edit');
    Route::put('/report/{hashid}', [ReportController::class, 'update'])->name('report.update');
    Route::get('/report/{hashid}', [ReportController::class, 'show'])->name('report.show');

    // Subida de evidencias
    Route::post('/upload-evidencias', [FileController::class, 'upload'])->name('files.upload');

    // Crear y administrar usuarios
    Route::get('/adminusers', [AdminUsersController::class, 'index'])->name('users.adminusers');
    Route::get('/adminusers/create', [AdminUsersController::class, 'create'])->name('users.newuser');
    Route::post('/adminusers', [AdminUsersController::class, 'store'])->name('users.store');
    Route::get('/adminusers/{hashid}/edit', [AdminUsersController::class, 'edit'])->name('users.edit');
    Route::put('/adminusers/{hashid}', [AdminUsersController::class, 'update'])->name('users.update');
    Route::delete('/adminusers/{hashid}', [AdminUsersController::class, 'destroy'])->name('users.destroy');
});
