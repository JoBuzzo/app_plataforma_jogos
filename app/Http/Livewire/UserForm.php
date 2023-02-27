<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UserForm extends Component
{
    use WithFileUploads;

    public $user, $name, $nick, $email, $password, $password_confirmation, $terms;
    
    public $photo;
    
    

    public function avatar(){
        
        $name = explode(' ', $this->name);
        $first = substr($name[0], 0, 1);
        $last = substr(end($name), 0, 1);
        $avatar = strtoupper($first . $last);

        return $avatar;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255|min:10',
            'nick' => 'required|string|max:30|min:3',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required',
            'photo' => 'nullable|image|max:1024'
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


        $nameFile = Str::slug($this->name) . '.'.$this->photo->getClientOriginalExtension();
        
        if($path = $this->photo->storeAs('users', $nameFile)){
            $this->user->update([
                'photo' => $path,
            ]);
        }

        if ($this->user) {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'nick' => $this->nick,
                'password' => $this->password ? bcrypt($this->password) : $this->user->password,
                'terms' => $this->terms,
                'photo' => $path,
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
