<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index'])->name('students.index');

Route::resource('students', StudentController::class)->except(['index']);
Route::get('/distribute', [StudentController::class, 'generateMonthlyRotations'])->name('distribute');
