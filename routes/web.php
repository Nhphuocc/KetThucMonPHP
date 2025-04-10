<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::get('/sach/{id}', [AuthController::class, 'showchitiet'])->name('chitiet');
Route::get('/admin', [AuthController::class, 'admin'])->name('admin');
Route::delete('/sach/{id}', [AuthController::class, 'destroy'])->name('deletebook');

Route::get('/sach/{id}/edit', [AuthController::class, 'edit'])->name('editbook');
Route::put('/sach/{id}', [AuthController::class, 'update'])->name('updatebook');

