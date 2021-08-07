<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\MultiStepForm;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/',[MainController::class, 'check'])->name('check');
Route::get('/admin/logout',[AdminController::class, 'logout'])->name('admin.logout');
Route::get('/logout',[UserController::class, 'logout'])->name('user.logout');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/', [MainController::class, 'login'])->name('login');
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/akun',[AdminController::class, 'akun'])->name('admin.akun');
    Route::get('/user/dashboard',[UserController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/admin/tambah_akun',[AdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/admin/hapus/{NIP}',[AdminController::class, 'hapus']);
    Route::post('/admin/edit',[AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/user/survei/{step}',[UserController::class, 'survei'])->name('user.survei');
});
