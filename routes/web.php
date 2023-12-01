<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

// 2 kode di bawah untuk check role dan hanya bisa membuka halaman dashboard sesuai role masing-masing
Route::middleware(['auth', 'role:user', 'verified'])->group(function () {
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.content.dashboard');
    Route::get('admin/orders', [AdminController::class, 'orders'])->name('admin.content.orders');
    Route::get('admin/sales', [AdminController::class, 'sales'])->name('admin.content.sales');
    Route::get('admin/foods', [AdminController::class, 'foods'])->name('admin.content.foods');
    Route::get('admin/tables', [AdminController::class, 'tables'])->name('admin.content.tables');
    Route::get('admin/users', [AdminController::class, 'users'])->name('admin.content.users');
    Route::get('admin/modals', [AdminController::class,'modals'])->name('admin.content.modals');
});