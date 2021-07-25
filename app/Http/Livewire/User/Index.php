<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;


    public $user_id;
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
            User::where('id', $id)->delete();
        } catch (QueryException $e) {

            return  session()->flash('danger', 'Tidak bisa menghapus akun');
        }

        session()->flash('message', 'Nasabah berhasil di hapus');
    }



    public function render()
    {
        $user = User::where('name', 'like', '%' . $this->search . '%')->paginate($this->halaman);
        return view('livewire.user.index', compact('user'))->extends('layouts.app')->section('content');
    }
}
