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

Route::get('/', 'S3Controller@index');
Route::get('delete-s3-img', 'S3Controller@deleteImg');
Route::get('download-s3-image', 'S3Controller@downloadImg');
