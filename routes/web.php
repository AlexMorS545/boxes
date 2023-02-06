<?php

use App\Http\Controllers\BoxController;
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

Route::get('/count/boxes/{countBottle}', [BoxController::class, 'countBoxes'])->name('boxes');

Route::get('/', function () {
    return view('welcome');
});
