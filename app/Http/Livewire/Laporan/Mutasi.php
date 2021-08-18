<?php

namespace App\Http\Livewire\Laporan;

use App\Models\nasabah;
use App\Models\transaksi;
use Livewire\Component;
use Livewire\WithPagination;

class Mutasi extends Component
{

    use WithPagination;
    public $nis;
    public $nasabah;
    public $awal;
    public $akhir;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {

        $this->awal = date('Y-m-d', strtotime('-7 day', strtotime(date("Y-m-d"))));
        $this->akhir = date("Y-m-d");
    }


    public function find()
    {

        $nasabah =  nasabah::where('nis', $this->nis)->first();

        if (!$nasabah) {
            $this->reset('nasabah');
            return $this->addError('nis', 'Nis tidak ditemukan');
        }

        $this->nasabah = $nasabah;
    }



    public function render()
    {

        $transaksi = null;

        if ($this->nasabah) {
            $transaksi = transaksi::whereBetween('updated_at',  [$this->awal . ' 00:00:00', $this->akhir . ' 23:59:59'])->where('nasabah_id', $this->nasabah->id)->orderBy('created_at', 'desc')->paginate(10);
        }



        return view('livewire.laporan.mutasi', compact('transaksi'))->extends('layouts.app')->section('content');
    }
}
