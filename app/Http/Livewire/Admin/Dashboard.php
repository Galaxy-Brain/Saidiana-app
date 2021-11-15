<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Dashboard extends Component
{
    public $users, $roles;

    public $name, $email, $password, $role;

    protected $rules = [
        'name'=>'required',
        'email'=>'required|unique:users,email',
        'password'=>'required',
        'role'=>'required',
    ];

    public function mount()
    {
        $this->users = User::all();
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }

    public function save(){
        $this->validate();
        $newuser = new User;
        $newuser->name = $this->name;
        $newuser->email = $this->email;
        $newuser->password = Hash::make($this->password);
        if (!auth()->user()->is_super && $this->role == 1) {
            abort(403, "You cannot create a super admin");
            return;
        }
        $newuser->role_id = $this->role;
        $newuser->save();

        $this->users = User::all();
        $this->name=null;
        $this->email=null;
        $this->password=null;
        $this->role=null;
        session()->flash('success', 'Successfully Created a new User');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user->is_super) {
            abort(403, "You Can't delete a Superior Administrator" );
            return;
        }
        $user->delete();
        $this->users = User::all();
        session()->flash('success', 'Successfully Deleted a User');

    }
}
