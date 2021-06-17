<?php

namespace App\Http\Livewire\Dasbord;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dasbord.index')->extends('layouts.app')->section('content');
    }
}
