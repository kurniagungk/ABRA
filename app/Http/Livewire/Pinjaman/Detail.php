<?php

namespace App\Http\Livewire\Pinjaman;


use App\Models\pinjaman as ModelsPinjaman;
use App\Models\pinjaman_paymen;
use Livewire\Component;

class Detail extends Component
{

    private $pinjaman_id;

    public function mount($id)
    {
        $this->pinjaman_id = $id;
    }


    public function render()
    {
        $pinjaman = ModelsPinjaman::where('id', $this->pinjaman_id)->with('paymen')->first();
        return view('livewire.pinjaman.detail', compact('pinjaman'))->extends('layouts.app')->section('content');
    }
}
