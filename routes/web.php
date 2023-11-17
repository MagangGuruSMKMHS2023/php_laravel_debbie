<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;

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
Route ::group(['middleware'=>['web']], function(){
    Route::get('/kelas',[KelasController::class,"index"]);
    Route::get('/header',[SiswaController::class,"index"]);
    Route::get('/kelas/create',[KelasController::class,"create"]);
    Route::post('/kelas/store',[KelasController::class,"store"]);
    Route::get('/kelas/{id_kelas}/edit',[KelasController::class,"edit"]);
    Route::put('/kelas/{id_kelas}',[KelasController::class,"update"]);
    Route::delete('/kelas/{id_kelas}',[KelasController::class,"delete"]);
    Route::get('/cari',[KelasController::class,"cari"]);

});