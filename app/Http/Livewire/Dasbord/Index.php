<?php

namespace App\Http\Livewire\Dasbord;

use App\Models\nasabah;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $akhir = date("Y-m-d");
        $awal = date('Y-m-d', strtotime('-30' . ' days'));

        $nasabah = nasabah::get();

        $transaksi = transaksi::select(DB::raw('sum(setor) as setor, sum(tarik) as tarik'))
            ->whereBetween('created_at',  [$awal, $akhir])
            ->first();


        $data = [
            'jumlahNasaba' => count($nasabah),
            'saldo' => $nasabah->sum('saldo'),
            'setor' => $transaksi->setor,
            'tarik' => $transaksi->tarik,
        ];





        return view('livewire.dasbord.index', compact('data'))->extends('layouts.app')->section('content');
    }
}
