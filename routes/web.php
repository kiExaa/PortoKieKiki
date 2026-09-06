<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\WorldCategoryController;
use App\Http\Controllers\Admin\WorldItemController;
use App\Http\Controllers\Admin\WorldImageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorldController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin/login', [AuthController::class, 'create'])->name('login');
Route::post('/admin/login', [AuthController::class, 'store']);
Route::post('/admin/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('projects', ProjectController::class);
    Route::resource('certificates', CertificateController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('social-links', SocialLinkController::class);
    Route::resource('documents', DocumentController::class);
    Route::resource('world-categories', WorldCategoryController::class)->except('destroy');
    Route::resource('world-items', WorldItemController::class);
    Route::get('world-images', [WorldImageController::class, 'index'])->name('world-images.index');
    Route::post('world-images', [WorldImageController::class, 'store'])->name('world-images.store');
    Route::delete('world-images/{worldImage}', [WorldImageController::class, 'destroy'])->name('world-images.destroy');
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/world', [WorldController::class, 'index'])->name('world.index');
    Route::get('/world/{category:slug}', [WorldController::class, 'category'])->name('world.category');
    Route::get('/world/item/{item}', [WorldController::class, 'item'])->name('world.item');



});
