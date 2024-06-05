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

Route::get('/', 'PengunjungController@index');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('login/submit', 'LoginController@login')->name('login-submit');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/dashboard', 'DashboardController@index')->name('home');


Route::get('inventori/rak', 'RakController@index')->name('rak');
Route::get('inventori/rak-tambah', 'RakController@tambah')->name('rak-tambah');
Route::post('inventori/rak-simpan', 'RakController@simpan')->name('rak-simpan');

Route::get('inventori/rak-edit/{id}', 'RakController@edit')->name('rak-edit');
Route::post('inventori/rak-update/{id}', 'RakController@update')->name('rak-update');
Route::get('inventori/rak-detail/{id}', 'RakController@detail')->name('rak-detail');
Route::get('inventori/rak-delete/{id}', 'RakController@delete')->name('rak-delete');


Route::get('inventori/buku', 'BukuController@index')->name('buku');
Route::get('inventori/buku-tambah', 'BukuController@tambah')->name('buku-tambah');
Route::post('inventori/buku-simpan', 'BukuController@simpan')->name('buku-simpan');

Route::get('inventori/buku-edit/{id}', 'BukuController@edit')->name('buku-edit');
Route::post('inventori/buku-update/{id}', 'BukuController@update')->name('buku-update');
Route::get('inventori/buku-delete/{id}', 'BukuController@delete')->name('buku-delete');


Route::get('user/anggota', 'AnggotaController@index')->name('anggota');
Route::get('user/anggota-tambah', 'AnggotaController@tambah')->name('anggota-tambah');
Route::post('user/anggota-simpan', 'AnggotaController@simpan')->name('anggota-simpan');

Route::get('user/anggota-edit/{id}', 'AnggotaController@edit')->name('anggota-edit');
Route::post('user/anggota-update/{id}', 'AnggotaController@update')->name('anggota-update');
Route::get('user/anggota-reset/{id}', 'AnggotaController@reset')->name('anggota-reset');
Route::get('user/anggota-delete/{id}', 'AnggotaController@delete')->name('anggota-delete');



Route::get('user/staf', 'StafController@index')->name('staf');
Route::get('user/staf-tambah', 'StafController@tambah')->name('staf-tambah');
Route::post('user/staf-simpan', 'StafController@simpan')->name('staf-simpan');

Route::get('user/staf-edit/{id}', 'StafController@edit')->name('staf-edit');
Route::post('user/staf-update/{id}', 'StafController@update')->name('staf-update');
Route::get('user/staf-reset/{id}', 'StafController@reset')->name('staf-reset');
Route::get('user/staf-delete/{id}', 'StafController@delete')->name('staf-delete');


Route::get('peminjaman', 'PeminjamanController@index')->name('peminjaman');
Route::get('peminjaman/reset', 'PeminjamanController@reset')->name('peminjaman-reset');
Route::post('peminjaman/simpan', 'PeminjamanController@simpan')->name('peminjaman-simpan');

//Panel Cari Buku
Route::get('/cari/buku', 'PeminjamanController@cari');
Route::post('/simpan/detil', 'PeminjamanController@simpanDetil');
Route::post('/cari/anggota', 'PeminjamanController@cariAnggota');

//Refresh Panel Search dan Scan
Route::get('/refresh/search', 'PeminjamanController@refreshPanelSearch');
Route::get('/refresh/scan', 'PeminjamanController@refreshPanelScan');
Route::get('/refresh/scan-anggota', 'PeminjamanController@refreshPanelScanAnggota');


Route::get('pengunjung', 'PengunjungController@index')->name('pengunjung');
Route::post('pengunjung-simpan', 'PengunjungController@simpan')->name('pengunjung-simpan');
Route::get('pengunjung-delete/{id}', 'PengunjungController@delete')->name('pengunjung-delete');


Route::get('temukan-buku', 'TemukanBukuController@index')->name('temukan-buku');

//Panel Cari Buku
Route::get('temukan-buku/cari/buku', 'TemukanBukuController@cari');
Route::post('temukan-buku/detil', 'TemukanBukuController@detil');

//Refresh Panel Search dan Scan
Route::get('temukan-buku/refresh/search', 'TemukanBukuController@refreshPanelSearch');



Route::get('pengembalian', 'PengembalianController@index')->name('pengembalian');
Route::get('pengembalian/detail/{id}', 'PengembalianController@detail')->name('pengembalian-detail');
Route::get('pengembalian-update/{id}', 'PengembalianController@update')->name('pengembalian-update');

//Panel Scan Relokasi
Route::post('/simpan/buku', 'RelokasiController@simpanBuku');
Route::get('/refresh/scan/relokasi', 'RelokasiController@refreshPanelScan');


Route::get('relokasi', 'RelokasiController@index')->name('relokasi');
Route::get('relokasi/reset', 'RelokasiController@reset')->name('relokasi-reset');
Route::post('relokasi/simpan', 'RelokasiController@simpan')->name('relokasi-simpan');


Route::get('informasi/buku', 'InfoBukuController@index')->name('info-buku');
Route::get('informasi/buku/cetak', 'InfoBukuController@cetak')->name('info-buku-cetak');


Route::get('informasi/pengunjung', 'InfoPengunjungController@index')->name('info-pengunjung');
