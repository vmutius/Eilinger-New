<?php

namespace App\Livewire\Antrag;

use App\Enums\GetAmount;
use App\Models\Sibling;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class SiblingForm extends Component
{
    public array $siblingsList = [];

    protected function rules(): array
    {
        return [
            'siblingsList.*.birth_year' => 'required|digits:4',
            'siblingsList.*.lastname' => 'required',
            'siblingsList.*.firstname' => 'required',
            'siblingsList.*.education' => 'nullable',
            'siblingsList.*.graduation_year' => 'nullable',
            'siblingsList.*.place_of_residence' => 'nullable',
            'siblingsList.*.get_amount' => ['nullable', new Enum(GetAmount::class)],
            'siblingsList.*.support_site' => [
                function ($attribute, $value, $fail) {
                    $index = explode('.', $attribute)[1];
                    $getAmountValue = $this->siblingsList[$index]['get_amount'] ?? null;

                    if ($getAmountValue === GetAmount::Yes && empty($value)) {
                        $fail(__('sibling.supportedSiteNeeded'));
                    }
                },
            ],
        ];
    }

    public function mount()
    {
        $existingSiblings = Sibling::where('user_id', auth()->user()->id)->get();

        if ($existingSiblings->isNotEmpty()) {
            foreach ($existingSiblings as $sibling) {
                $this->siblingsList[] = $sibling->toArray();
            }
        } else {
            $this->addSibling(); // Add one empty sibling form by default
        }
    }

    public function addSibling()
    {
        $this->siblingsList[] = [
            'birth_year' => '',
            'lastname' => '',
            'firstname' => '',
            'education' => '',
            'graduation_year' => '',
            'place_of_residence' => '',
            'get_amount' => null,
            'support_site' => '',
        ];
    }

    public function removeSibling($index)
    {
        unset($this->siblingsList[$index]);
        $this->siblingsList = array_values($this->siblingsList);
    }

    public function saveSiblings()
    {
        $validatedData = $this->validate();

        foreach ($this->siblingsList as $siblingData) {
            $sibling = Sibling::updateOrCreate(
                [
                    'user_id' => auth()->user()->id,
                    'firstname' => $siblingData['firstname'],
                    'lastname' => $siblingData['lastname'],
                ],
                array_merge($siblingData, [
                    'user_id' => auth()->user()->id,
                    'is_draft' => false
                ])
            );
        }

        session()->flash('success', __('userNotification.siblingSaved'));
    }

    public function render()
    {
        return view('livewire.antrag.sibling-form');
    }
}
