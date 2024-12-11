<?php

namespace App\Livewire\Auth;

use App\Http\Traits\AddressUpdateTrait;
use App\Http\Traits\UserUpdateTrait;
use App\Models\Address;
use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\Attributes\Layout;

class RegisterPrivat extends Component
{
    use AddressUpdateTrait;
    use UserUpdateTrait;

    public $terms = false;

    public $model;

    public function messages()
    {
        return [
            //User
            'username.unique' => __('user.usernameUnique'),
            'password.regexp' => __('user.passwordRegexp'),
        ];
    }

    public function rules()
    {
        return [
            'username' => 'required|unique:users,username',
            'phone' => 'nullable',
            'mobile' => 'nullable',
            'salutation' => 'required',
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'required|same:password',
            'street' => 'required|min:3',
            'number' => 'nullable',
            'plz' => 'required|min:4',
            'town' => 'required|min:3',
            'country_id' => 'required',
            'terms' => 'accepted',
        ];
    }

    public function validationAttributes(): array
    {
        return array_merge(
            Lang::get('user'),
            Lang::get('address')
        );
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function registerPrivat()
    {
        $this->validate();

        $user = User::create([
            'username' => $this->username,
            'type' => 'nat',
            'password' => Hash::make($this->password),
            'salutation' => $this->salutation,
            'website' => $this->website,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
        ]);

        $address = Address::create([
            'user_id' => $user->id,
            'street' => $this->street,
            'number' => $this->number,
            'plz' => $this->plz,
            'town' => $this->town,
            'country_id' => $this->country_id,
            'is_draft' => false,
        ]);
        event(new Registered($user));
        auth()->login($user);

        return redirect()->route('verification.notice', app()->getLocale());
    }

    public function mount()
    {
        $this->model = User::class;
        session()->forget('valid-username');
        session()->forget('valid-email');

        $this->model = Address::class;
        session()->forget('valid-street');
        session()->forget('valid-number');
        session()->forget('valid-plz');
        session()->forget('valid-town');
    }

    #[Layout('components.layout.eilinger')]
    public function render()
    {
        $countries = Country::all();

        return view('livewire.auth.register_privat', compact('countries'));
    }
}
