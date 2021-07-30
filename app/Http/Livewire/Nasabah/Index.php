<?php

namespace App\Http\Livewire\Nasabah;

use App\Exports\NasabahExport;
use App\Models\nasabah;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{

    use WithPagination;


    public $nasabah_id;
    public $confirm;

    public $search;
    public $halaman = 10;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingHalaman()
    {
        $this->resetPage();
    }

    public function delet($id)
    {
        try {
            $nasabah =  nasabah::where('id', $id)->first();

            if ($nasabah->saldo > 0) {
                $this->reset('nasabah_id');
                return  session()->flash('danger', 'harap kosongkan saldo nasabah');
            }


            if ($nasabah->foto != 'foto/user.png')
                Storage::disk('public')->delete($nasabah->foto);

            $nasabah->delete();
        } catch (QueryException $e) {

            return  session()->flash('danger', 'harap hapus trasaksi produk');
        }

        session()->flash('message', 'Nasabah berhasil di hapus');
    }

    public function export()
    {
        return Excel::download(new NasabahExport, 'Nasabah.xlsx');
    }


    public function render()
    {
        $nasabah = nasabah::where('nis', 'like', '%' . $this->search . '%')->Orwhere('nama', 'like', '%' . $this->search . '%')->paginate($this->halaman);
        return view('livewire.nasabah.index', compact('nasabah'))->extends('layouts.app')->section('content');
    }
}
