<?php

use App\Http\Controllers\MainController;
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
    return view('home');
});


Route::get('/pollingunit', [MainController::class, 'pollingunit']);
Route::get('/totalpoll', [MainController::class, 'summedtotal']);
Route::get('/store', [MainController::class, 'store']);
Route::post('/store-now', [MainController::class, 'store_now']);


Route::post('/fetch-lgas', [MainController::class, 'fetchlga']);
Route::post('api/fetch-pollingunit', [MainController::class, 'fetchpollingunit']);
Route::get('/party', [MainController::class, 'party']);





