<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{

    public $nama, $email, $password, $password_confirmation;



    protected function rules()
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }


    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Berhasi Menambah User');
        return redirect()->route('user.index');
    }


    public function render()
    {
        return view('livewire.user.create')->extends('layouts.app')->section('content');
    }
}
