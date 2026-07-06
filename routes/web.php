<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\LecturerController;
use App\Http\Controllers\Frontend\AcademicController;
use App\Http\Controllers\Frontend\FacilityController;
use App\Http\Controllers\Frontend\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/lecturers', [LecturerController::class, 'index'])->name('lecturers');

Route::get('/academic', [AcademicController::class, 'index'])->name('academic');

Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');