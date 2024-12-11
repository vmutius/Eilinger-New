<?php

namespace App\Livewire\Antrag;

use Illuminate\Support\Facades\Lang;
use Livewire\Component;

class UserNatDarlehenForm extends Component
{
    public $user;

    protected function rules(): array
    {
        return [
            'user.firstname' => 'required',
            'user.lastname' => 'required',
            'user.birthday' => 'required|date',
            'user.salutation' => 'required',
            'user.phone' => 'required',
            'user.mobile' => 'sometimes',
            'user.contact_aboard' => 'sometimes',
        ];
    }

    public function validationAttributes()
    {
        return Lang::get('user');
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->user->salutation = $this->user->salutation ?? '';
    }

    public function render()
    {
        return view('livewire.antrag.user-nat-darlehen-form');
    }

    public function saveUserNat()
    {
        $this->validate();
        $this->user->is_draft = false;
        $this->user->save();
        session()->flash('success', __('userNotification.userSaved'));
    }
}
