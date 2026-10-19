<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\AdminUserController;

/*
|--------------------------------------------------------------------------
| Guest Routes (Halaman Publik)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/gallery', [ContentController::class, 'publicGallery'])->name('gallery');
Route::get('/news', [ContentController::class, 'publicNews'])->name('news');

// Autentikasi
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes (Dashboard & Form Apply)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [ApplicationController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/apply', [ApplicationController::class, 'showApplyForm'])->name('user.apply');
    Route::post('/apply', [ApplicationController::class, 'storeApplication']);
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Proteksi Middleware Role Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminUserController::class, 'dashboard'])->name('dashboard');
    
    // Management Applications
    Route::get('/applications', [ApplicationController::class, 'adminIndex'])->name('applications');
    Route::patch('/applications/{id}', [ApplicationController::class, 'adminUpdate']);

    // Management Content (Gallery & News)
    Route::get('/gallery', [ContentController::class, 'adminGallery'])->name('gallery');
    Route::post('/gallery', [ContentController::class, 'storeGallery']);
    Route::delete('/gallery/{id}', [ContentController::class, 'destroyGallery']);

    Route::get('/news', [ContentController::class, 'adminNews'])->name('news');
    Route::post('/news', [ContentController::class, 'storeNews']);
    Route::delete('/news/{id}', [ContentController::class, 'destroyNews']);

    // Reports & Users
    Route::get('/reports', [ApplicationController::class, 'adminReports'])->name('reports');
    Route::get('/users', [AdminUserController::class, 'indexUsers'])->name('users');
});