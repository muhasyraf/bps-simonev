<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use App\Actions\Fortify\PasswordValidationRules;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UserManagement extends Component
{
    use PasswordValidationRules;
    use LivewireAlert;

    public $user;
    public $name;
    public $email;
    public $role_id;
    public $editMode;
    public $cdID;
    public $confirmingItemAdd = false;
    public $confirmingItemDeletion = false;

    public function render()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return view('livewire.user-management', ['users' => $users, 'roles' => $roles]);
    }


    public function confirmItemEdit(User $user)
    {
        $this->user = $user;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role_id = $this->user->role_id;
        $this->editMode = true;
        $this->resetValidation();
        $this->confirmingItemAdd = true;
    }

    public function confirmItemAdd()
    {
        $this->resetValidation();
        $this->reset();
        $this->confirmingItemAdd = true;
    }

    public function saveItemEdit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            'role_id' => 'required|integer',
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ]);
        $this->resetValidation();
        $this->reset();
        $this->alert('success', 'Update Data Berhasil!', [
            'position' => 'center',
            'timer' => '4500',
            'toast' => true,
        ]);
    }

    public function confirmItemDelete($id)
    {
        $this->cdID = $id;
        $this->confirmingItemDeletion = true;
    }

    public function deleteItem($id)
    {
        $this->user = User::find($id);
        $this->user->delete();
        $this->confirmingItemDeletion = false;
        $this->alert('warning', 'Data berhasil dihapus!', [
            'position' => 'center',
            'timer' => '4500',
            'toast' => true,
        ]);
    }
}
