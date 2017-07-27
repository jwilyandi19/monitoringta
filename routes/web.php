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

Route::get('/', 'BeritaController@index');
Route::get('/home', 'BeritaController@index');
Route::get('/login', 'AuthController@logIn');
Route::post('/login', 'AuthController@doLogin');
Route::get('/logout', 'AuthController@logOut');
Route::get('/gantipassword', 'AuthController@gantiPass');
Route::post('/gantipassword', 'AuthController@gantiPassword');
Route::get('/seminarjadwal', 'SeminarController@seminarJadwal');
Route::get('/ujianjadwal', 'SidangController@ujianJadwal');

Route::get('/ketersediaandosen', 'FrontendController@ketersediaanDosen');
Route::get('/seminar', 'SeminarController@index');
Route::get('/pengajuanjadwal', 'FrontendController@pengajuanJadwal');
Route::get('/statusta', 'FrontendController@statusTa');
Route::get('/tambahkanjadwal', 'FrontendController@tambahkanJadwal');
Route::get('/pencarianta', 'PencarianController@pencarianTA');
Route::get('/error', 'FrontendController@error');

Route::group(['middleware' => ['Mahasiswa']], function(){
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
    Route::get('/pengajuan/create', 'PengajuanController@create');
    Route::post('/pengajuan', 'PengajuanController@store');
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
    Route::get('/home/create', 'BeritaController@create');
    Route::post('/home', 'BeritaController@store');
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
    Route::post('/pengujiseminar/{id}', 'PengujiController@formPengujiSeminar');
    Route::post('/terimapengajuanseminar', 'PengujiController@terimaSeminar');
    Route::post('/batalkanseminar', 'PengujiController@batalkanSeminar');

    Route::get('/pengujiujian', 'PengujiController@pengujiUjian');
    Route::get('/formpengujiujian/{id}', 'PengujiController@formUjian');
    Route::post('/pengujiujian/{id}', 'PengujiController@formPengujiUjian');  
    Route::post('/terimapengajuanujian', 'PengujiController@terimaUjian');
    Route::post('/batalkanujian', 'PengujiController@batalkanUjian');
});