<?php

namespace App\Http\Livewire\Pinjaman;

use App\Models\pinjaman;
use App\Models\saldo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class Create extends Component
{


    public $saldo;
    public $tanggal;
    public $jumlah;
    public $keterangan;

    protected $rules = [];


    protected function rules()
    {
        $this->saldo();
        return [
            'jumlah' => 'required|integer|min:1|max:' . $this->saldo,
            'tanggal' => 'required|date',
            'keterangan' => 'required',
        ];
    }

    public function mount()
    {
        $this->saldo();
        $this->tanggal = date('Y-m-d');
    }

    private function saldo()
    {
        $tabungan = saldo::where('nama', 'tabungan')->first();
        $pinjaman = saldo::where('nama', 'pinjaman')->first();

        $this->saldo = $tabungan->jumlah - $pinjaman->jumlah;
    }


    public function store()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            pinjaman::create([
                'user_id' =>   Auth::id(),
                'tunggakan' => $this->jumlah,
                'total' => $this->jumlah,
                'keterangan' => $this->keterangan,
                'tanggal' => $this->tanggal,
            ]);

            $saldo = saldo::where('nama', 'pinjaman')->first();
            $saldo->jumlah += $this->jumlah;
            $saldo->save();

            db::commit();

            session()->flash('message', 'Berhasi Menambahkan Pinjaman');
            return redirect()->route('pinjaman.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return session()->flash('danger', 'Berhasil Setor Saldo');
        }
    }



    public function render()
    {
        return view('livewire.pinjaman.create',)->extends('layouts.app')->section('content');
    }
}
