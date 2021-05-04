<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profile;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/dashboard', [profile::class ,'view']);

Route::get('/myProfile',[profile::class,'myProfile']);

Route::post('/updateProfile',[profile::class,'updateProfile']);

Route::post('/deleteProfilePhoto',[profile::class,'deleteProfilePhoto']);

Route::get('/changePassword',[profile::class,'changePassword']);

Route::post('/updatePassword',[profile::class,'updatePassword']);

Route::get('/logout', [profile::class ,'logout']);


