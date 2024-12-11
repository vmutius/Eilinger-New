<?php

namespace App\Livewire\Antrag;

use App\Models\Application;
use App\Models\CostDarlehen;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CostFormDarlehen extends Component
{
    public $costs = [];
    public $currency_id;
    public $myCurrency;
    public $getAmountCostDarlehen;

    protected $rules = [
        'costs.*.cost_name' => 'required',
        'costs.*.cost_amount' => 'required|numeric',
    ];

    public function attributes(): array
    {
        return [
            'costs.*.cost_name' => __('cost.cost_name'),
            'costs.*.cost_amount' => __('cost.cost_amount')
        ];
    }

    public function messages(): array
    {
        return [
            'costs.*.cost_name' => __('cost.cost_name_req'),
            'costs.*.cost_amount' => __('cost.cost_amount_req'),
        ];
    }

    public function mount()
    {
        $this->costs = CostDarlehen::where('application_id', session()->get('appl_id'))->get() ?? new Collection;
        $this->currency_id = Application::where('id', session()->get('appl_id'))->pluck('currency_id');
        $this->myCurrency = Currency::where('id', $this->currency_id)->first();
    }

    public function render()
    {
        return view('livewire.antrag.cost-form-darlehen');
    }

    public function saveCostDarlehen()
    {
        $this->validate();
    
        foreach ($this->costs as $cost) {
            $cost->is_draft = false;
            $cost->user_id = auth()->user()->id;
            $cost->application_id = session()->get('appl_id');
            $cost->save();
        };
    
        session()->flash('success', __('userNotification.costSaved'));
    }

    public function getAmountCostDarlehen()
    {
        $this->getAmountCostDarlehen = '0.00';
        foreach ($this->costs as $cost)
        {
            $this->getAmountCostDarlehen += $cost['cost_amount'];
        }

        return $this->getAmountCostDarlehen;
    }

    public function addCostDarlehen()
    {
        $this->costs->push(new CostDarlehen(['cost_name' => '', 'cost_amount' => 0, 'id' => null]));
    }

    public function delCostDarlehen($index)
    {
        $cost = $this->costs->get($index);

        // If the cost has an ID, it exists in the database
        if ($cost && $cost->id) {
            // Delete from the database
            $cost->delete();
        }

        // Remove from the collection
        $this->costs->forget($index);

    }
}
