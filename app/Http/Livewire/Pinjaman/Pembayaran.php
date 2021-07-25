<?php

namespace App\Http\Livewire\Pinjaman;

use App\Models\pinjaman;
use App\Models\pinjaman_paymen;
use App\Models\saldo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pembayaran extends Component
{

    public $pinjaman_id;
    public $total;
    public $tunggakan;
    public $tanggal;
    public $keterangan;
    public $jumlah;


    protected function rules()
    {
        $this->data_pinjaman($this->pinjaman_id);
        return [
            'jumlah' => 'required|integer|min:1|max:' . $this->tunggakan,
            'tanggal' => 'required|date',
        ];
    }



    public function mount($id)
    {
        $this->tanggal = date("Y-m-d");
        $this->pinjaman_id = $id;
        $this->data_pinjaman($id);
    }

    private function data_pinjaman($id)
    {
        $data = pinjaman::find($id);
        $this->total = $data->total;
        $this->tunggakan = $data->tunggakan;
        $this->keterangan = $data->keterangan;
    }

    public function store()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            $pinjaman = pinjaman::find($this->pinjaman_id);
            $pinjaman->status = $pinjaman->tunggakan - $this->jumlah == 0 ? 'lunas' : 'belum';
            $pinjaman->tunggakan -= $this->jumlah;
            $pinjaman->dibayar += $this->jumlah;
            $pinjaman->save();

            $pinjaman->paymen()->create([
                'user_id' => Auth::id(),
                'jumlah' => $this->jumlah
            ]);


            $saldo = saldo::where('nama', 'pinjaman')->first();
            $saldo->jumlah -= $this->jumlah;
            $saldo->save();

            DB::commit();

            session()->flash('message', 'Berhasi Melakunan Pembayaran Pinjaman');
            return redirect()->route('pinjaman.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return session()->flash('danger', 'Berhasil Setor Saldo');
        }
    }



    public function render()
    {
        return view('livewire.pinjaman.pembayaran')->extends('layouts.app')->section('content');
    }
}
