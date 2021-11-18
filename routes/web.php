<?php

use App\Exports\IKMExport;
use App\Exports\IKMExportView;
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
    Route::get('/user',[UserController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/admin/tambah_akun',[AdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/admin/hapus',[AdminController::class, 'hapus'])->name('admin.hapus_pegawai');
    Route::post('/admin/edit',[AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/user/survei/{step}',[UserController::class, 'survei'])->name('user.survei');
    Route::view('/user/survei-sukses', 'pegawai.sukses')->name('user.survei-sukses');
    Route::get('/user/lihat-survei',[UserController::class, 'lihat'])->name('user.lihat-survei');
    Route::get('/user/detail-survei/{no_responden}',[UserController::class, 'detail'])->name('user.detail-survei');
    Route::get('/user/hapus',[UserController::class, 'hapus'])->name('user.hapus-survei');
    Route::get('/user/detail-survei/download/{no_responden}',[UserController::class, 'export_excel'])->name("user.download-ikm-excel");
});
