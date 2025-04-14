<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::get('/sach/create', [AuthController::class, 'showcreatebook'])->name('showaddbook');
Route::post('/sach', [AuthController::class, 'createBook'])->name('createBook');
Route::get('/sach/{id}', [AuthController::class, 'showchitiet'])->name('chitiet');
Route::get('/admin', [AuthController::class, 'admin'])->name('admin');
Route::get('/showtacgia', [AuthController::class, 'showTacGia'])->name('showTacGia');
Route::get('/showUser', [AuthController::class, 'showUser'])->name('showUser');
Route::delete('/sach/{id}', [AuthController::class, 'destroySach'])->name('deletebook');
Route::delete('/tacgia/{id}', [AuthController::class, 'destroyTacgia'])->name('deletetacgia');
Route::get('/sach/{id}/edit', [AuthController::class, 'edit'])->name('editbook');
Route::put('/sach/{id}', [AuthController::class, 'update'])->name('updatebook');
Route::get('/tacgia/{id}/edit', [AuthController::class, 'editTacGia'])->name('editTacGia');
Route::post('/tacgia/{id}/update', [AuthController::class, 'updateTacGia'])->name('updateTacGia');




