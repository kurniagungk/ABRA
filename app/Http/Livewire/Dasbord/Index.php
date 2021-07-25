<?php

namespace App\Http\Livewire\Dasbord;

use App\Models\nasabah;
use App\Models\saldo;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $akhir = date("Y-m-d");
        $awal = date('Y-m-d', strtotime('-30' . ' days'));

        $saldo = saldo::where('nama', 'tabungan')->first();
        $pinjaman = saldo::where('nama', 'pinjaman')->first();

        $nasabah = nasabah::count();





        $data = [
            'jumlahNasaba' => $nasabah,
            'saldo' => $saldo->jumlah,
            'pinjaman' => $pinjaman->jumlah,
        ];





        return view('livewire.dasbord.index', compact('data'))->extends('layouts.app')->section('content');
    }
}
