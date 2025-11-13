<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/testimoni', [HomeController::class, 'testimoni'])->name('testimoni');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [HomeController::class, 'storeContact'])->name('kontak.store');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::post('/testimoni/store', [HomeController::class, 'storeTestimoni'])->name('testimoni.store.frontend');

Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [HomeController::class, 'login'])->name('login.post');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('menus', MenuController::class);
    Route::resource('sales', SalesController::class);
    Route::resource('testimoni', TestimoniController::class);
    Route::put('/testimoni/{id}/approve', [TestimoniController::class, 'approve'])->name('testimoni.approve');
});
