<?php

namespace App\Livewire\Admin;

use App\Models\Account;
use App\Models\Address;
use App\Models\Application;
use App\Models\Cost;
use App\Models\CostDarlehen;
use App\Models\Education;
use App\Models\Enclosure;
use App\Models\Financing;
use App\Models\FinancingOrganisation;
use App\Models\Parents;
use App\Models\Sibling;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Antrag extends Component
{
    public $application;

    public $user;

    public $address;

    public $abweichendeAddress;

    public $aboardAddress;

    public $education;

    public $account;

    public $parents;

    public $siblings;

    public $enclosure;

    public $cost;

    public $costDarlehen;

    public $financing;

    public $financingOrganisation;

    public $getAmountCostDarlehen = 0;

    public $getAmountFinancingOrganisation = 0;

    public function mount($application_id): void
    {
        $this->application = Application::find($application_id);
        $this->user = User::where('id', $this->application->user_id)->first();
        $this->address = Address::where('user_id', $this->user->id)
            ->where('is_wochenaufenthalt', 0)
            ->first();
        $this->abweichendeAddress = Address::where('user_id', $this->user->id)
            ->where('is_wochenaufenthalt', 1)
            ->first();
        $this->aboardAddress = Address::where('user_id', $this->user->id)
            ->where('is_aboard', 1)
            ->first();
        $this->education = Education::where('application_id', $application_id)->first();
        $this->account = Account::where('application_id', $application_id)->first();
        $this->parents = Parents::where('user_id', $this->user->id)->get();
        $this->siblings = Sibling::where('user_id', $this->user->id)->get();
        $this->enclosure = Enclosure::where('application_id', $application_id)->first();
        $this->cost = Cost::where('application_id', $application_id)->first();
        $this->costDarlehen = CostDarlehen::where('application_id', $application_id)->get();
        $this->financing = Financing::where('application_id', $application_id)->first();
        $this->financingOrganisation = FinancingOrganisation::where('application_id', $application_id)->get();
    }

    #[Layout('components.layout.admin-dashboard')]
    public function render()
    {
        return view('livewire.admin.antrag');
    }

    public function getTotalCostDarlehen()
    {
        $this->costDarlehen->each(function ($costDarlehen) {
            $this->getAmountCostDarlehen += $costDarlehen->cost_amount;
        });

        return $this->getAmountCostDarlehen;
    }

    public function getTotalFinancingOrganisation()
    {
        $this->financingOrganisation->each(function ($financingOrganisation) {
            $this->getAmountFinancingOrganisation += $financingOrganisation->financing_amount;
        });

        return $this->getAmountFinancingOrganisation;
    }
}
