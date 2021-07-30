<?php

namespace App\Http\Livewire\Pinjaman;

use App\Models\pinjaman;
use App\Models\saldo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    public $status;
    public $halaman = 10;
    public $pinjaman_id;

    public function delet($id)
    {
        try {
            DB::beginTransaction();
            $pinjaman =  pinjaman::where('id', $id)->first();
            if ($pinjaman->dibayar > 0)
                return  session()->flash('danger', 'tidak bisa dihapus karena ada transaksi');
            $saldo = saldo::where('nama', 'pinjaman')->first();
            $saldo->jumlah -= $pinjaman->total;
            $saldo->save();
            $pinjaman->delete();
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
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
