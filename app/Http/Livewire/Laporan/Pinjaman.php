<?php

namespace App\Http\Livewire\Laporan;

use App\Exports\LaporanPinjamanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\pinjaman as ModelsPinjaman;
use Livewire\Component;

class Pinjaman extends Component
{


    public $awal, $akhir, $pinjaman, $status;
    public $tanggal = false;



    public function find()
    {
        if ($this->tanggal) {

            $validatedData = $this->validate([
                'awal' => 'required|date',
                'akhir' => 'required|date',
            ]);
        }

        $query = ModelsPinjaman::where('status', 'like', '%' . $this->status . '%');
        if ($this->tanggal) {
            $query->whereBetween('tanggal', [$this->awal, $this->akhir]);
        }


        $this->pinjaman = $query->get();
    }

    public function updated()
    {
        $this->reset('pinjaman');
    }

    public function export()
    {
        $data = [
            'awal' => $this->awal,
            'akhir' => $this->awal,
            'data' => $this->pinjaman,
        ];

        $tanggal = $this->tanggal ? $this->awal . ' - '  . $this->akhir  : 'semua';

        return Excel::download(new LaporanPinjamanExport($data), 'Laporam Pinjaman ' . $tanggal . ' .xlsx');
    }


    public function render()
    {
        return view('livewire.laporan.pinjaman')->extends('layouts.app')->section('content');;
    }
}
