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

    protected function rules()
    {
        return [
            'awal' => 'required_if:tanggal,true|date',
            'akhir' => 'required_if:tanggal,true|date',
        ];
    }

    public function find()
    {
        $this->validate();
        $query = ModelsPinjaman::where('status', 'like', '%' . $this->status . '%');
        if ($this->tanggal) {
            $query->whereDate('tanggal', '<=', $this->awal);
            $query->whereDate('tanggal', '>=', $this->akhir);
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
