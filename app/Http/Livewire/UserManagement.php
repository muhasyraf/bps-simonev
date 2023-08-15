<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class UserManagement extends Component
{
    public function render()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return view('livewire.user-management', ['users' => $users, 'roles' => $roles]);
    }
}
