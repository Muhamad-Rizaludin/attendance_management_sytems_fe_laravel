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

Route::get('/', function () {
    return view('pengguna.cobalogin');
});
//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});
// for users mendapatkan akses melihat profile
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});


// for users mendapatkan akses melihat tabel data kelas
// for users untuk mendapatkan akses membuat atau menambah data kelas
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/kelas', 'App\Http\Controllers\KarController@index')->name('dashboard.kelas');
    Route::post('/kelas/tambahdata', 'App\Http\Controllers\KarController@tambahdata')->name('kelas.tambahdata');
    Route::post('/kelas/update/{kode_kelas}', 'App\Http\Controllers\KarController@updatekar')->name('kelas.update.{kode_kelas}');
    Route::delete('/kelas/delete/{kode_kelas}', 'App\Http\Controllers\KarController@destroy');
    Route::get('/getmahasiswa', 'App\Http\Controllers\KarController@getMahasiswa');
    Route::get('/getnim', 'App\Http\Controllers\KarController@getNim');
    Route::get('/getmatkuladmin', 'App\Http\Controllers\KarController@getMatakuliah');
    Route::get('/getkodemk', 'App\Http\Controllers\KarController@getKodeMk');
    Route::get('/getdosen', 'App\Http\Controllers\KarController@getDosen');
    Route::get('/getkodedosen', 'App\Http\Controllers\KarController@getKodeDosen');
});


// for users untuk mendapatkan akses membuat atau menambah, update dan delete data user
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/user', 'App\Http\Controllers\UserController@index')->name('dashboard.users');
    Route::post('/dashboard/tambahuser', 'App\Http\Controllers\UserController@store')->name('tambah.store');
    Route::patch('/user/update/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::delete('/user/delete/{id}', 'App\Http\Controllers\UserController@destroy');
});

// for users untuk mendapatkan akses membuat atau menambah, update dan delete data dosen
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/dosen', 'App\Http\Controllers\DosenController@index')->name('dashboard.dosens');
    Route::post('/dosen/tambahdosen', 'App\Http\Controllers\DosenController@tambahdata')->name('tambah.dosen');
    Route::post('/dosen/update/{kode_dosen}', 'App\Http\Controllers\DosenController@updatedosen')->name('dosen.update.{kode_dosen}');
    Route::delete('/dosen/delete/{kode_dosen}', 'App\Http\Controllers\DosenController@destroy');
});

// for users untuk mendapatkan akses membuat atau menambah, update dan delete data mahasiswa
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/mhs', 'App\Http\Controllers\MahasiswaController@index')->name('dashboard.mahasiswa');
    Route::post('/mhs/tambahmhs', 'App\Http\Controllers\MahasiswaController@tambahdata')->name('tambah.mhs');
    Route::post('/mhs/update/{nim}', 'App\Http\Controllers\MahasiswaController@updatemahasiswa')->name('mhs.update.{nim}');
    Route::delete('/mhs/delete/{nim}', 'App\Http\Controllers\MahasiswaController@destroy');
});

// for users untuk mendapatkan akses membuat atau menambah, update dan delete data kurikulum
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/kurikulum', 'App\Http\Controllers\KurikulumController@index')->name('dashboard.kurikulum');
    Route::post('/kurikulum/tambahkurikulum', 'App\Http\Controllers\KurikulumController@tambahdata')->name('tambah.kurikulum');
    Route::post('/kurikulum/update/{kode_mk}', 'App\Http\Controllers\KurikulumController@updatekurikulum')->name('kurikulum.update.{kode_mk}');
    Route::delete('/kurikulum/delete/{kode_mk}', 'App\Http\Controllers\KurikulumController@destroy');
});

// for users untuk mendapatkan akses membuat atau menambah, update dan delete data kurikulum
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/settingmhs', 'App\Http\Controllers\SettingMahasiswaController@index')->name('dashboard.settingmhs');
    Route::post('/settingmhs/tambahsetting', 'App\Http\Controllers\SettingMahasiswaController@tambahdata')->name('tambah.settingmhs');
    Route::post('/settingmhs/update/{id}', 'App\Http\Controllers\SettingMahasiswaController@updatesetting')->name('settingmhs.update.{id}');
    Route::delete('/settingmhs/delete/{id}', 'App\Http\Controllers\SettingMahasiswaController@destroy');
});

// for users untuk mendapatkan akses membuat atau menambah, update dan delete data Jadwal Perkuliahan
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/jadwalkuliah', 'App\Http\Controllers\JadwalKuliahController@index')->name('dashboard.jadwalkuliah');
    Route::post('/jadwal/tambahjadwal', 'App\Http\Controllers\JadwalKuliahController@tambahdata')->name('tambah.jadwal');
    Route::post('/jadwal/update/{kd_jadwal}', 'App\Http\Controllers\JadwalKuliahController@updatejadwal')->name('jadwal.update.{kode_mk}');
    Route::delete('/jadwal/delete/{kd_jadwal}', 'App\Http\Controllers\JadwalKuliahController@destroy');
    Route::get('/getkelas', 'App\Http\Controllers\JadwalKuliahController@getKodeKelas');
});


// for user karyawan atau dosen
Route::group(['middleware' => ['auth', 'role:karyawan']], function() {
    Route::get('/dashboard/jadwalkuliah/dosen', 'App\Http\Controllers\JadwalKuliahController@getJadwalKuliahPerDosen')->name('dashboard.jadwalkuliahdosen');
    Route::get('/dashboard/jadwalkuliah/dosen/detail/{kd_jadwal}', 'App\Http\Controllers\JadwalKuliahController@detailjadwal')->name('dashboard.detailjadwalkuliahdosen');
    Route::post('/presensi/tambahdata', 'App\Http\Controllers\PresensiController@tambahdata')->name('tambahdata.presensi');
    Route::get('/dashboard/laporanpresensi', 'App\Http\Controllers\PresensiController@index')->name('dashboard.laporanpresensi');
    Route::get('/getmatkul', 'App\Http\Controllers\KarController@getMatakuliah');
});



/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/
require __DIR__.'/auth.php';
