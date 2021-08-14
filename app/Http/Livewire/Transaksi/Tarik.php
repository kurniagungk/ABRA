<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\nasabah;
use App\Models\saldo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tarik extends Component
{


    public $nis;
    public $nasabah;
    private $nasabah_id;
    public $tarik;
    public $tanggal;


    protected $rules = [
        'tarik' => 'required|min:1|numeric',
    ];

    public function mount()
    {
        $this->tanggal = date("Y-m-d\TH:i:s");
    }


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

        if ($nasabah->saldo <= 0 || $nasabah->saldo < $this->tarik)
            return $this->addError('tarik', 'Saldo Tidak Mencukupi');

        try {

            DB::beginTransaction();

            $nasabah->saldo -= $this->tarik;

            $nasabah->save();

            $nasabah->transaksi()->create([
                'user_id' => Auth::id(),
                'tarik' => $this->tarik,
                'created_at' => $this->tanggal,
            ]);

            $saldo = saldo::where('nama', 'tabungan')->first();
            $saldo->jumlah -= $this->tarik;
            $saldo->save();

            DB::commit();

            $this->emit('start');

            $this->reset('nasabah', 'tarik', 'nis');
        } catch (Throwable $e) {
            DB::rollBack();
            return session()->flash('danger', 'Gagal Tarik Tunai');;
        }
    }






    public function render()
    {

        return view('livewire.transaksi.tarik')->extends('layouts.app')->section('content');
    }
}
