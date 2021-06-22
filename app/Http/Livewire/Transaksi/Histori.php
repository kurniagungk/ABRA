<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;

class Histori extends Component
{

    public $transaksi;
    public $saldoHistori;

    public function mount($nasabah)
    {
        $transaksi = $nasabah->transaksi;
        $transaksiHistori = $nasabah->transaksi()->orderBy('created_at', 'desc')->take(5)->get();;


        $this->transaksi = $transaksi;

        $this->saldoHistori = [
            'setor' => $transaksi->sum('setor') - $transaksiHistori->sum('setor'),
            'tarik' => $transaksi->sum('tarik') - $transaksiHistori->sum('tarik')
        ];
    }



    public function render()
    {
        return view('livewire.transaksi.histori');
    }
}
