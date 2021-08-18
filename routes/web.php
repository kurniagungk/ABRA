<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check())
        return redirect()->route('home');
    else
        return view('auth.login');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', App\Http\Livewire\Dasbord\Index::class)->name('home');
    Route::get('/nasabah/create', App\Http\Livewire\Nasabah\Create::class)->name('nasabah.create');
    Route::get('/nasabah', App\Http\Livewire\Nasabah\Index::class)->name('nasabah.index');
    Route::get('/nasabah/{id}/edit', App\Http\Livewire\Nasabah\Edit::class)->name('nasabah.edit');
    Route::get('/nasabah/import', App\Http\Livewire\Nasabah\Import::class)->name('nasabah.import');
    Route::get('/transaksi/setor/', App\Http\Livewire\Transaksi\Setor::class)->name('transaksi.setor');
    Route::get('/transaksi/tarik/', App\Http\Livewire\Transaksi\Tarik::class)->name('transaksi.tarik');

    Route::get('/pinjaman/create/', App\Http\Livewire\Pinjaman\Create::class)->name('pinjaman.create');
    Route::get('/pinjaman', App\Http\Livewire\Pinjaman\Index::class)->name('pinjaman.index');
    Route::get('/pinjaman/{id}/pembayaran', App\Http\Livewire\Pinjaman\Pembayaran::class)->name('pinjaman.pembayaran');
    Route::get('/pinjaman/{id}/detail', App\Http\Livewire\Pinjaman\Detail::class)->name('pinjaman.detail');

    Route::get('/user', App\Http\Livewire\User\Index::class)->name('user.index');
    Route::get('/user/create', App\Http\Livewire\User\Create::class)->name('user.create');
    Route::get('/user/{id}/edit', App\Http\Livewire\User\Edit::class)->name('user.edit');

    Route::get('/laporan', App\Http\Livewire\Laporan\Index::class)->name('laporan.index');
    Route::get('/laporan/pinjaman', App\Http\Livewire\Laporan\Pinjaman::class)->name('laporan.pinjaman');
    Route::get('/laporan/mutasi', App\Http\Livewire\Laporan\Mutasi::class)->name('laporan.mutasi');
});
