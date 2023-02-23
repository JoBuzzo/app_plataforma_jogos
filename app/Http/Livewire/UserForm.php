<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserForm extends Component
{

    public $user;
    public $name;
    public $nick;
    public $email;
    public $password;
    public $password_confirmation;
    public $terms;
    
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255|min:10',
            'nick' => 'required|string|max:30|min:3',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required',
        ];

        if ($this->user) {
            $rules['email'] .= ',' . $this->user->id;
            $rules['password'] = 'nullable|min:6|confirmed';
        }

        return $rules;
    }

    public function mount($user = null)
    {
        $this->user = $user;


        // caso ja exista o user
        if ($user) {
            $this->name = $user->name;
            $this->nick = $user->nick;
            $this->email = $user->email;
            $this->terms = $user->terms;
        }

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        

        if ($this->user) {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'nick' => $this->nick,
                'password' => $this->password ? bcrypt($this->password) : $this->user->password,
                'terms' => $this->terms,
            ]);
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'nick' => $this->nick,
                'password' => bcrypt($this->password),
                'terms' => $this->terms,
            ]);
            $this->reset();
        }

        

    }
    public function render()
    {
        return view('livewire.user-form');
    }
}
