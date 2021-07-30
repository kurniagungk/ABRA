<?php

namespace App\Http\Livewire\Laporan;

use App\Models\transaksi;
use Livewire\Component;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{


    public $awal, $akhir, $transaksi;



    protected $rules = [
        'awal' => 'required|date',
        'akhir' => 'required|date',
    ];

    public function mount()
    {
        $this->awal = date("Y-m-01");
        $this->akhir = date("Y-m-d");
    }

    public function find()
    {
        $this->validate();
        $this->transaksi = transaksi::whereBetween('updated_at',  [$this->awal . ' 00:00:00', $this->akhir . ' 23:59:59'])->get();
    }

    public function export()
    {
        $data = [
            'awal' => $this->awal,
            'akhir' => $this->awal,
            'data' => $this->transaksi,
        ];
        return Excel::download(new LaporanExport($data), 'Laporam ' . $this->awal . ' - '  . $this->akhir . ' .xlsx');
    }


    public function render()
    {
        return view('livewire.laporan.index')->extends('layouts.app')->section('content');
    }
}
