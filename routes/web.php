<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerDashboard;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerDataAts;
use App\Http\Controllers\ControllerDataPeminjam;
use App\Http\Controllers\ControllerDataPengembalian;

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

//Dashboard
Route::get('/viewuser', [ControllerDashboard::class, 'viewuser']);
Route::get('/inputuser', [ControllerDashboard::class, 'inputuser']);
Route::get('/downloadfoto', [ControllerDashboard::class, 'downloadfoto']);
Route::post('/saveuser', [ControllerDashboard::class, 'saveuser']);
Route::get('/edituser/{id}', [ControllerDashboard::class, 'edituser']);
Route::post('/updateuser/{id}', [ControllerDashboard::class, 'updateuser']);
Route::get('/deleteuser/{id}', [ControllerDashboard::class, 'deleteuser']);
Route::get('/cobainput', [ControllerDashboard::class, 'cobainput']);
Route::get('/dashboard', [ControllerDashboard::class, 'dashboard']);

//dashboard dan user
Route::get('/dashboard', [ControllerDashboard::class, 'dashboard'])->middleware('auth');
Route::get('/thema', [ControllerDashboard::class, 'thema']);
Route::get('/thema_id', [ControllerDashboard::class, 'thema_id']);

//dataats
Route::get('/viewdataats', [ControllerDataAts::class, 'viewdataats'])->middleware('auth');
Route::get('/inputdataats', [ControllerDataAts::class, 'inputdataats'])->middleware('auth');
Route::get('/editdataats/{id}', [ControllerDataAts::class, 'editdataats']);
Route::post('/updatedataats/{id}', [ControllerDataAts::class, 'updatedataats']);
Route::get('/deletedataats/{id}', [ControllerDataAts::class, 'deletedataats']);
Route::post('/savedataats', [ControllerDataAts::class, 'savedataats']);

//datapeminjam
Route::get('/viewdatapeminjam', [ControllerDataPeminjam::class, 'viewdatapeminjam'])->middleware('auth');
Route::get('/inputdatapeminjam', [ControllerDataPeminjam::class, 'inputdatapeminjam'])->middleware('auth');
Route::get('/editdatapeminjam/{id}', [ControllerDataPeminjam::class, 'editdatapeminjam']);
Route::post('/updatedatapeminjam/{id}', [ControllerDataPeminjam::class, 'updatedatapeminjam']);
Route::get('/deletedatapeminjam/{id}', [ControllerDataPeminjam::class, 'deletedatapeminjam']);
Route::post('/savedatapeminjam', [ControllerDataPeminjam::class, 'savedatapeminjam']);

//datapengembalian
Route::get('/viewdatapengembalian', [ControllerDataPengembalian::class, 'viewdatapengembalian'])->middleware('auth');
Route::get('/inputdatapengembalian', [ControllerDataPengembalian::class, 'inputdatapengembalian'])->middleware('auth');
Route::get('/editdatapengembalian/{id}', [ControllerDataPengembalian::class, 'editdatapengembalian']);
Route::post('/updatedatapengembalian/{id}', [ControllerDataPengembalian::class, 'updatedatapengembalian']);
Route::get('/deletedatapengembalian/{id}', [ControllerDataPengembalian::class, 'deletedatapengembalian']);
Route::post('/savedatapengembalian', [ControllerDataPengembalian::class, 'savedatapengembalian']);

//login
Route::get('/login', [ControllerLogin::class, 'login'])->name('login');
Route::post('/proseslogin', [ControllerLogin::class, 'proseslogin']);
Route::get('/logout', [ControllerLogin::class, 'logout']);
