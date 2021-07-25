<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Edit extends Component
{

    public $nama, $email, $password, $password_confirmation, $user_id;
    public $change = false;

    public function mount(User $id)
    {
        $this->user_id = $id->id;
        $this->email = $id->email;
        $this->nama = $id->name;
    }

    protected function rules()
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'email' => 'required|unique:users,email,' . $this->user_id,
            'password' => 'required_if:change,true|confirmed',
        ];
    }

    public function update()
    {
        $this->validate();
        $user = User::find($this->user_id);
        $user->name = $this->nama;
        $user->email = $this->email;
        if ($this->change)
            $user->password = Hash::make($this->password);
        $user->save();

        session()->flash('message', 'Berhasi Edit User ' . $user->name);
        return redirect()->route('user.index');
    }



    public function render()
    {
        return view('livewire.user.edit')->extends('layouts.app')->section('content');
    }
}
