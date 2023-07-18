<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('roles',[App\Http\Controllers\RoleController::class,'index'])->name('index');
Route::get('roles/role_create',[App\Http\Controllers\RoleController::class,'role_create'])->name('role_create');
Route::post('roles/role_store',[App\Http\Controllers\RoleController::class,'role_store'])->name('role_store');
Route::get('role_edit/{role_id}',[App\Http\Controllers\RoleController::class,'role_edit'])->name('role_edit');
Route::post('roles/role_update/{role_id}',[App\Http\Controllers\RoleController::class,'role_update'])->name('role_update');
// Route::delete('roles/role_delete/{role_id}', [App\Http\Controllers\RoleController::class, 'role_delete'])->name('role_delete');

Route::delete('roles/role_delete/{role_id}',[App\Http\Controllers\RoleController::class,'role_delete'])->name('role_delete');
