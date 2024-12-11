<?php

namespace App\Livewire\Antrag;

use App\Enums\Education;
use App\Enums\Grade;
use App\Enums\Time;
use App\Enums\InitialEducation;
use App\Models\Education as EducationModel;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class EducationForm extends Component
{
    public $education;

    protected function rules(): array
    {
        return [
            'education.education' => ['required', 'min:1',new Enum(Education::class)],
            'education.name' => 'required',
            'education.final' => 'required',
            'education.grade' => ['required', new Enum(Grade::class)],
            'education.ects_points' => 'required',
            'education.time' => ['required', new Enum(Time::class)],
            'education.begin_edu' => 'required|date',
            'education.duration_edu' => 'required',
            'education.start_semester' => 'required',
            'education.initial_education' => ['required', new Enum(InitialEducation::class)],
        ];
    }
    public function validationAttributes(): array
    {
        return Lang::get('education');
    }
    public function mount()
    {
        $this->education = EducationModel::loggedInUser()
            ->where('application_id', session()->get('appl_id'))
            ->first() ?? new EducationModel;
    }

    public function render()
    {
        return view('livewire.antrag.education-form');
    }

    public function saveEducation()
    {

        $this->validate();
        $this->education->is_draft = false;
        $this->education->user_id = auth()->user()->id;
        $this->education->application_id = session()->get('appl_id');
        $this->education->save();
        session()->flash('success', __('userNotification.educationSaved'));
    }


}
