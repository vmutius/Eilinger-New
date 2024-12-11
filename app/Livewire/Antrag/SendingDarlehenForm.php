<?php

namespace App\Livewire\Antrag;

use App\Models\Account;
use App\Models\Address;
use App\Models\CostDarlehen;
use App\Models\Enclosure;
use App\Models\Financing;
use App\Models\FinancingOrganisation;
use App\Models\User;
use Livewire\Component;

class SendingDarlehenForm extends Component
{
    public $userNoDraft;

    public $addressNoDraft;

    public $aboardAddressNoDraft;

    public $costNoDraft;

    public $accountNoDraft;

    public $financingNoDraft;

    public $financingOrganisationNoDraft;

    public $enclosureNoDraft;

    /**
     * @var true
     */
    private bool $completeApp;

    public function mount()
    {
        //wenn alle Tabellen is_draft = false zurückliefern, ist alles abgefüllt und der Antrag kann eingereicht werden.
        $this->userNoDraft = (bool) User::where('id', auth()->user()->id)->where('is_draft', false)->exists();
        $this->addressNoDraft = (bool) Address::where('user_id', auth()->user()->id)->where('is_wochenaufenthalt', 0)->where('is_draft', false)->exists();
        $this->aboardAddressNoDraft = (bool) Address::where('user_id', auth()->user()->id)->where('is_aboard', 1)->where('is_draft', false)->exists();
        $this->accountNoDraft = (bool) Account::where('application_id', session()->get('appl_id'))->where('is_draft', false)->exists();
        $this->costNoDraft = (bool) CostDarlehen::where('application_id', session()->get('appl_id'))->where('is_draft', false)->exists();
        $this->financingNoDraft = (bool) Financing::where('application_id', session()->get('appl_id'))->where('is_draft', false)->exists();
        $this->financingOrganisationNoDraft = (bool) FinancingOrganisation::where('application_id', session()->get('appl_id'))->where('is_draft', false)->exists();
        $this->enclosureNoDraft = (bool) Enclosure::where('application_id', session()->get('appl_id'))->where('is_draft', false)->exists();
    }

    public function render()
    {
        return view('livewire.antrag.sending-darlehen-form');
    }

    public function completeApplication()
    {
        if ($this->userNoDraft &&
        $this->addressNoDraft &&
        $this->accountNoDraft &&
        $this->costNoDraft && ($this->financingNoDraft || $this->financingOrganisationNoDraft) &&
        $this->enclosureNoDraft) {
            $this->completeApp = true;
            $this->dispatch('completeApp');
        }

    }
}
