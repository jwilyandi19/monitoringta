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

//User Umum (Semua User)

//home
Route::get('/', 'BeritaController@index');
Route::get('/home', 'BeritaController@index');

//login
Route::post('/login', 'AuthController@doLogin');

//logout
Route::get('/logout', 'AuthController@logOut');

//ganti password
Route::get('/gantipassword', 'AuthController@gantiPass');
Route::post('/gantipassword', 'AuthController@gantiPassword');

//jadwal seminar + jadwal
Route::get('/seminarjadwal', 'SeminarController@seminarJadwal');
Route::get('/ujianjadwal', 'SidangController@ujianJadwal');

//Pencarian TA
Route::get('/pencarianta', 'PencarianController@pencarianTA');

//Halaman Error
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

    //Detail TA
    Route::resource('/bimbingan', 'BimbinganController');
    Route::post('/seminar/nilai', 'BimbinganController@nilaiSeminar');
    Route::post('/ujian/nilai', 'BimbinganController@nilaiUjian');
    Route::get('/mahasiswauji', 'BimbinganController@mahasiswaUji');
    Route::post('/bimbingan/asistensi', 'BimbinganController@asistensi');
    Route::get('/detailuji/{id}', 'BimbinganController@detailUji');
});

Route::group(['middleware' => ['Koordinator']], function(){
    Route::get('/home/create', 'BeritaController@create');
    Route::post('/home', 'BeritaController@store');
    Route::get('/home/{id}/edit', 'BeritaCOntroller@edit');
    Route::put('/home/{id}','BeritaController@update');
    Route::get('/home/{id}/delete','BeritaController@destroy');

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