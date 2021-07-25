<?php

namespace App\Http\Livewire\Pinjaman;

use App\Models\pinjaman;
use Livewire\Component;

class Index extends Component
{

    public $status;
    public $halaman = 10;
    public $pinjaman_id;

    public function delet($id)
    {
        try {
            pinjaman::where('id', $id)->delete();
        } catch (QueryException $e) {
            return  session()->flash('danger', 'harap hapus trasaksi produk');
        }

        session()->flash('message', 'Pinjaman berhasil di hapus');
    }

    public function render()
    {
        $pinjaman = pinjaman::where('status', 'like', '%' . $this->status . '%')->paginate($this->halaman);
        return view('livewire.pinjaman.index', compact('pinjaman'))->extends('layouts.app')->section('content');
    }
}
