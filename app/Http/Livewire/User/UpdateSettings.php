<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateSettings extends Component
{
    public User $user;
    public string $old_password;
    public string $new_password;
    public string $new_password_confirmation;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'old_password' => ['required_with:new_password,new_password_confirmation', 'current_password'],
        'new_password' => ['required_with:old_password', 'min:8', 'confirmed'],
        'new_password_confirmation' => ['required_with:old_password', 'min:8']
    ];

    public function resetFields()
    {
        $this->old_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
    }

    public function mount()
    {
        $this->user = auth()->user();
        self::resetFields();
    }

    public function render()
    {
        return view('livewire.user.update-settings');
    }

    public function updateUserSettings()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->user->name,
            'email' => $this->user->email,
        ]);

        if (isset($this->new_password)) {
            $this->user->update(['password' => Hash::make($this->new_password)]);
        }

        self::resetFields();

        session()->flash('message', 'Post successfully updated.');
    }
}
