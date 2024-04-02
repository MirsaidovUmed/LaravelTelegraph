<?php

use App\Http\Controllers\TextController;
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

Route::get('/text', [TextController::class, 'index']);
Route::post('/text', [TextController::class, 'create']);
Route::put('/text/{id}',[TextController::class,'update']);
Route::delete('/text/{id}',[TextController::class,'destroy']);  
