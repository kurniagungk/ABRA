<?php

namespace App\Http\Livewire\Nasabah;

use Livewire\Component;
use App\Models\nasabah;
use Livewire\WithFileUploads;


class Create extends Component
{

    use WithFileUploads;

    public $nama, $nis, $jenis, $tempat, $tanggal, $alamat, $foto, $fotoStatus = false;


    protected $rules = [
        'nis' => 'required|unique:nasabah,nis',
        'nama' => 'required',
        'tempat' => 'required',
        'tanggal' => 'required|date',
        'jenis' => 'required',
        'alamat' => 'required',
    ];


    public function updatedfoto()
    {
        $this->validate([
            'foto' => 'image|max:5000|mimes:png,jpeg,bmp,gif', // 1MB Max
        ]);
    }

    public function store()
    {


        $this->validate();

        if ($this->foto)
            $foto = $this->foto->store('foto', 'public');
        else
            $foto = 'foto/user.png';


        nasabah::create([
            'nis' => $this->nis,
            'nama' => $this->nama,
            'tempat_lahir' => $this->tempat,
            'tgl_lahir' => $this->tanggal,
            'alamat' => $this->alamat,
            'status' => 'aktif',
            'foto' => $foto,
            'saldo',
        ]);


        session()->flash('message', 'Berhasil Menambahkan Nasabah');

        return redirect()->route('nasabah.index');
    }


    public function render()
    {
        return view('livewire.nasabah.create')->extends('layouts.app')->section('content');
    }
}
