<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'FrontendController@home');
Route::get('/home', 'FrontendController@home');
Route::post('/login', 'AuthController@doLogin');
Route::get('/pengajuanta', 'FrontendController@pengajuanTa');
Route::get('/statusproposal', 'FrontendController@statusProposal');
Route::get('/detailta', 'FrontendController@detailTa');
Route::get('/detailta2', 'FrontendController@detailTa2');
Route::get('/ketersediaandosen', 'FrontendController@ketersediaanDosen');
Route::get('/pengajuanjadwal', 'FrontendController@pengajuanJadwal');
Route::get('/statusta', 'FrontendController@statusTa');
Route::get('/mahasiswabimbingan', 'FrontendController@mahasiswaBimbingan');
Route::get('/tambahkanjadwal', 'FrontendController@tambahkanJadwal');