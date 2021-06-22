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
    return view('welcome');
});

Auth::routes();

Route::get('/home', App\Http\Livewire\Dasbord\Index::class)->name('home');

Route::get('/nasabah/create', App\Http\Livewire\Nasabah\Create::class)->name('nasabah.create');
Route::get('/nasabah', App\Http\Livewire\Nasabah\Index::class)->name('nasabah.index');
Route::get('/nasabah/{id}/edit', App\Http\Livewire\Nasabah\Edit::class)->name('nasabah.edit');
Route::get('/nasabah/import', App\Http\Livewire\Nasabah\Import::class)->name('nasabah.import');
Route::get('/transaksi/setor/', App\Http\Livewire\Transaksi\Setor::class)->name('transaksi.setor');
Route::get('/transaksi/tarik/', App\Http\Livewire\Transaksi\Tarik::class)->name('transaksi.tarik');
