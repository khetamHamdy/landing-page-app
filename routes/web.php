<?php

use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\frontController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
require __DIR__ . '/Admin.php';
Route::get('/', [frontController::class, 'index'])->name('index1');
Route::post('ajaxRequest', [ContactController::class, 'ajaxRequestPost']);

require __DIR__ . '/adminauth.php';


