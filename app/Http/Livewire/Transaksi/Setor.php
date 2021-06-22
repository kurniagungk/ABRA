<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\nasabah;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Setor extends Component
{


    public $nis;
    public $nasabah;
    private $nasabah_id;
    public $setor;


    protected $rules = [
        'setor' => 'required|min:1|numeric',
    ];


    public function find()
    {

        $nasabah =  nasabah::where('nis', $this->nis)->first();

        if (!$nasabah) {
            $this->reset('nasabah');
            return $this->addError('nis', 'Nis tidak ditemukan');
        }


        $this->nasabah = $nasabah;
        $this->nasabah_id = $nasabah->id;
        $this->emit('nis');
    }

    public function save()
    {


        $this->validate();


        $nasabah = $this->nasabah;

        try {

            DB::beginTransaction();

            $nasabah->saldo += $this->setor;

            $nasabah->save();

            $nasabah->transaksi()->create([
                'user_id' => Auth::id(),
                'setor' => $this->setor
            ]);

            DB::commit();

            $this->emit('start');

            $this->reset('nasabah', 'setor', 'nis');
        } catch (Throwable $e) {
            report($e);
            DB::rollBack();
            return session()->flash('danger', 'Berhasil Setor Saldo');;
        }
    }




    public function render()
    {
        return view('livewire.transaksi.setor')->extends('layouts.app')->section('content');
    }
}
