<?php

namespace App\Http\Livewire\Nasabah;

use App\Models\nasabah;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Index extends Component
{



    public $nasabah_id;
    public $confirm;


    public function delet($id)
    {
        try {
            nasabah::where('id', $id)->delete();
        } catch (QueryException $e) {

            return  session()->flash('danger', 'harap hapus trasaksi produk');
        }

        session()->flash('message', 'Nasabah berhasil di hapus');
    }


    public function render()
    {
        $nasabah = nasabah::get();
        return view('livewire.nasabah.index', compact('nasabah'))->extends('layouts.app')->section('content');
    }
}
