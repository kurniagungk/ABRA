<?php

namespace App\Http\Livewire\Nasabah;

use App\Models\nasabah;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{


    use WithFileUploads;

    public $nasabah_id, $nama, $nis, $jenis, $tempat, $tanggal, $alamat, $foto, $foto_old, $fotoStatus = false;



    protected function rules()
    {
        return [
            'nis' => 'required|unique:nasabah,nis,' . $this->nasabah_id,
            'nama' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required|date',
            'jenis' => 'required',
            'alamat' => 'required',
        ];
    }

    public function updatedfoto()
    {
        $this->validate([
            'foto' => 'image|max:1024|mimes:png,jpeg,bmp,gif', // 1MB Max
        ]);
    }


    public function mount(nasabah $id)
    {
        $this->nasabah_id = $id->id;
        $this->nama = $id->nama;
        $this->nis = $id->nis;
        $this->jenis = $id->jenis;
        $this->tempat = $id->tempat_lahir;
        $this->tanggal = $id->tgl_lahir;
        $this->alamat = $id->alamat;
        $this->foto_old = $id->foto;
    }

    public function update()
    {
        $this->validate();
        $nasabah = nasabah::find($this->nasabah_id);
        $nasabah->id =  $this->nasabah_id;
        $nasabah->nama = $this->nama;
        $nasabah->nis = $this->nis;
        $nasabah->jenis = $this->jenis;
        $nasabah->tempat_lahir = $this->tempat;
        $nasabah->tgl_lahir = $this->tanggal;
        $nasabah->alamat = $this->alamat;
        if ($this->foto) {

            Storage::disk('public')->delete($nasabah->foto);
            $foto = $this->foto->store('foto', 'public');
            $nasabah->foto = $foto;
        }
        $nasabah->save();

        session()->flash('message', 'Berhasil Edit Nasabah ' . $nasabah->nama);

        return redirect()->route('nasabah.index');
    }


    public function render()
    {

        return view('livewire.nasabah.edit')->extends('layouts.app')->section('content');
    }
}
