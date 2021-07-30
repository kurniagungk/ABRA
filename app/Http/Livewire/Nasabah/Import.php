<?php

namespace App\Http\Livewire\Nasabah;

use App\Imports\NasabahImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{

    use WithFileUploads;

    public $file;



    public function import()
    {



        $validatedData = $this->validate([
            'file' => 'required',
        ]);

        $excel = [];

        try {

            $excel = Excel::toArray(new NasabahImport, $this->file, null, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Throwable $t) {
            return $this->addError('file', 'File Rusak');
        }
    }


    public function render()
    {
        return view('livewire.nasabah.import')->extends('layouts.app')->section('content');
    }
}
