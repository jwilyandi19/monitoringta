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
Route::get('/berita', 'BeritaController@index');
Route::get('/berita/{id}', 'BeritaController@show');

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

    //Detail TA
    Route::get('/detailta', 'ProgresController@detail');
    Route::post('/progres/uploadfile', 'ProgresController@uploadFile');
    Route::post('/seminar/uploadfile', 'SeminarController@uploadFile');
    Route::post('/sidang/uploadfile','SidangController@uploadFile');

    //Pengajuan Seminar
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
    Route::post('/bimbingan/ubahdetail', 'BimbinganController@ubahDetail');
    
    Route::get('/datadosen', 'AuthController@dataDosen');
    Route::post('/tambahkanbidang', 'AuthController@tambahkanBidang');
    Route::post('/bidang', 'AuthController@hapusBidang');
});

Route::group(['middleware' => ['Koordinator']], function(){
    Route::resource('/home', 'BeritaController');
    Route::post('/hapusberita', 'BeritaController@destroy');
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

    Route::post('/resetpass', 'UserController@resetPassword');
    Route::get('/manajementa', 'UserController@indexManajemen');
    Route::post('/tidaklulus', 'UserController@tidakLulus');
    Route::post('/dinyatakanlulus', 'UserController@dinyatakanLulus');
    Route::get('/detailta/{id}', 'UserController@detailTA');

});