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

Route::get('/', 'FrontendController@home');
Route::get('/home', 'FrontendController@home');
Route::get('/login', 'AuthController@logIn');
Route::post('/login', 'AuthController@doLogin');
Route::get('/logout', 'AuthController@logOut');
Route::get('/gantipassword', 'AuthController@gantiPass');
Route::post('/gantipassword', 'AuthController@gantiPassword');

Route::get('/ketersediaandosen', 'FrontendController@ketersediaanDosen');
Route::get('/pengajuanjadwal', 'FrontendController@pengajuanJadwal');
Route::get('/statusta', 'FrontendController@statusTa');
Route::get('/tambahkanjadwal', 'FrontendController@tambahkanJadwal');
Route::get('/pencarianta', 'PencarianController@pencarianTA');
Route::get('/error', 'FrontendController@error');

Route::group(['middleware' => ['Mahasiswa']], function(){
    Route::resource('/pengajuan', 'PengajuanController');
    Route::resource('/progres', 'ProgresController');
    Route::get('/statusproposal', 'FrontendController@statusProposal');
    Route::get('/detailta', 'ProgresController@detail');
    Route::post('/progres/uploadfile', 'ProgresController@uploadFile');
    Route::get('/pengajuanseminar', 'SeminarController@pengajuanJadwal');
    Route::post('/pengajuanseminar', 'SeminarController@doPengajuan');
    Route::get('/formpengajuanseminar/{id}', 'SeminarController@formPengajuan');
    Route::post('/batalkanpengajuanseminar', 'SeminarController@pembatalanJadwal');
    Route::get('/pengajuanujian', 'SidangController@pengajuanJadwal');
    Route::post('/pengajuanujian', 'SidangController@doPengajuan');
    Route::get('/formpengajuanujian/{id}', 'SidangController@formPengajuan');
    Route::post('/batalkanpengajuanujian', 'SidangController@pembatalanJadwal');
    Route::get('/pengajuanta', 'FrontendController@pengajuanTa');
});

Route::group(['middleware' => ['Dosen']], function(){
    Route::get('/ketersediaanseminar', 'SeminarController@ketersediaanSeminar');
    Route::post('/mengisiketersediaanseminar', 'SeminarController@mengisiKetersediaan');
    Route::post('/batalkanketersediaanseminar', 'SeminarController@batalkanKetersediaan');
    Route::get('/ketersediaanujian', 'SidangController@ketersediaanUjian');
    Route::post('/mengisiketersediaanujian', 'SidangController@mengisiKetersediaan');
    Route::post('/batalkanketersediaanujian', 'SidangController@batalkanKetersediaan');
    Route::get('/mahasiswabimbingan', 'FrontendController@mahasiswaBimbingan');
    Route::post('/bimbingan/konfirmasitugasakhir', 'BimbinganController@konfirmasiTA');
    Route::post('/bimbingan/tolaktugasakhir', 'BimbinganController@tolakTA');
    Route::post('/bimbingan/asistensi', 'BimbinganController@asistensi');
    Route::resource('/bimbingan', 'BimbinganController');
    Route::get('/detailta2', 'FrontendController@detailTa2');
    Route::post('/seminar/nilai', 'BimbinganController@nilaiSeminar');
    Route::post('/ujian/nilai', 'BimbinganController@nilaiUjian');
});

Route::group(['middleware' => ['Koordinator']], function(){
    Route::resource('/user', 'UserController');
    Route::post('/user/uploadfile', 'UserController@uploadFile');
    Route::post('/createuser1','AuthController@buatUser1');
    Route::resource('/jadwal', 'JadwalController');
    Route::get('/jadwalseminar', 'JadwalController@jadwalSeminar');
    Route::post('/jadwal/seminarhapus', 'JadwalController@hapusJadwalSeminar');
    Route::post('/jadwal/tambahseminar', 'JadwalController@tambahJadwalSeminar');
    Route::get('/jadwalujian', 'JadwalController@jadwalUjian');
    Route::post('/jadwal/ujianhapus', 'JadwalController@hapusJadwalUjian');
    Route::post('/jadwal/tambahujian', 'JadwalController@tambahJadwalUjian');
    Route::get('/pengujiseminar', 'PengujiController@pengujiSeminar');
    Route::get('/formpengujiseminar/{id}', 'PengujiController@formSeminar');
    Route::get('/pengujiujian', 'PengujiController@pengujiUjian');
});