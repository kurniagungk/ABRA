<?php

namespace App\Http\Livewire\Nasabah;

use Livewire\Component;
use Livewire\WithFileUploads;

class Import extends Component
{

    use WithFileUploads;

    public $file;

    protected $rules = [
        'nis' => 'required|unique:nasabah,nis',
        'nama' => 'required',
        'tempat' => 'required',
        'tanggal' => 'required|date',
        'jenis' => 'required',
        'alamat' => 'required',
    ];

    public function store()
    {



        $validatedData = $this->validate([
            'file' => 'required',
            'toko' => 'required_if:sumber,2|required_if:sumber,3'
        ]);

        $excel = [];

        try {


            //  $excel = Excel::toArray(new Genie, $this->file, null, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Throwable $t) {
            return $this->addError('file', 'File Rusak, Harap Save As');
        }
    }


    public function render()
    {
        return view('livewire.nasabah.import')->extends('layouts.app')->section('content');
    }
}
