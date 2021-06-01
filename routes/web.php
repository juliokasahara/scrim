<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

 /* ALT + SHIFT + A */

Route::get('/', function () {
    return view('auth/login');
    
});

Auth::routes();

Route::get('/usuario', [UserController::class,'index'])->name('usuario');

Route::get('/grupo', [GroupController::class,'index'])->name('grupo');
Route::get('/grupo/adicionar', [GroupController::class,'add'])->name('group.add');
Route::post('/grupo/salvar', [GroupController::class,'save'])->name('grupo.salvar');
Route::get('/grupo/editar/{id}', [GroupController::class,'edit'])->name('grupo.editar');
Route::put('/grupo/atualizar/{id}', [GroupController::class,'update'])->name('grupo.atualizar');
Route::get('/grupo/deletar/{id}', [GroupController::class,'delete'])->name('grupo.deletar');

//Route::get('/grupo/detalhe/{id}', [GroupController::class,'detail'])->name('grupo.detalhe');



