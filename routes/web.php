<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ReportController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');

Route::get('/menu', [DashboardController::class, 'index'])->name('menu');

Route::get('/adminuser', [DashboardController::class, 'adminuser'])->name('profile.adminuser');

Route::get('/newreport', [DashboardController::class, 'newreport'])->name('report.newreport');

Route::get('/adminreport', [DashboardController::class, 'adminreport'])->name('report.adminreport');

Route::get('/report', [ReportController::class, 'report'])->name('report.viewreport'); 

Route::post('/upload-evidencias', [FileController::class, 'upload']);