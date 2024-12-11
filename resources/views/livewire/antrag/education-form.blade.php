@php
    use App\Enums\Education;
    use App\Enums\InitialEducation;
@endphp
<form wire:submit="saveEducation">
    @csrf
    <div class="content-header mb-3">
        <h3 class="mb-0">{{ __('education.education') }}</h3>
        <div class="d-flex justify-content-between">
            <div>
                <small>{{ __('education.subtitle') }}</small>
            </div>

        </div>
        <div class="row g-3">

            <x-notification/>

            <div class="col-sm-2">
                <label class="form-label" for="name">{{ __('education.initial_education') }}? *</label>
                <select wire:model.blur="education.initial_education" name="initialEducation" class="form-select">
                    <option hidden>{{  __('attributes.please_select')  }}</option>
                    @foreach (InitialEducation::cases() as $inital)
                        <option value="{{ $inital->value }}">{{ __('education.initial_education_name.' .$inital->name) }} </option>
                    @endforeach
                </select>
                <span class="text-danger">@error('education.initial_education'){{ $message }}@enderror</span>
            </div>

            <div class="col-sm-5">
                <label class="form-label" for="education">{{ __('education.education') }} *</label>
                <select wire:model.blur="education.education" name="education" class="form-select">
                    <option hidden>{{  __('attributes.please_select')  }}</option>
                    @foreach (Education::cases() as $education)
                        <option value="{{ $education->value }}">{{ __('education.education_name.' .$education->name) }} </option>
                    @endforeach
                </select>
                <span class="text-danger">@error('education.education'){{ $message }}@enderror</span>

            </div>
            <div class="col-sm-5">
                <label class="form-label" for="name">{{ __('education.name') }} *</label>
                <input wire:model.blur="education.name" type="text" class="form-control"/>
                <span class="text-danger">@error('education.name'){{ $message }}@enderror</span>
            </div>
            <div class="col-sm-6">
                <label class="form-label" for="final">{{ __('education.final') }} *</label>
                <input wire:model.blur="education.final" type="text" class="form-control"/>
                <span class="text-danger">@error('education.final'){{ $message }}@enderror</span>
            </div>
            <div class="col-sm-6">
                <label class="form-label" for="grade">{{ __('education.grade') }} *</label>
                <select wire:model.blur="education.grade" name="grade" class="form-select">
                    <option hidden>{{  __('attributes.please_select')  }}</option>
                    @foreach (App\Enums\Grade::cases() as $grade)
                        <option value="{{ $grade->value }}">{{ __('education.grade_name.' .$grade->name) }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('education.grade'){{ $message }}@enderror</span>
            </div>
            <div class="col-sm-6">
                <label class="form-label" for="ects_points">{{ __('education.ects_points') }} *</label>
                <input wire:model.blur="education.ects_points" type="text" id="ects_points" class="form-control"/>
                <span class="text-danger">@error('education.ects_points'){{ $message }}@enderror</span>
            </div>
            <div class="col-sm-6">
                <label class="form-label" for="time">{{ __('education.time') }} *</label>
                <select wire:model.blur="education.time" class="form-select">
                    <option hidden>{{  __('attributes.please_select')  }}</option>
                    @foreach (App\Enums\Time::cases() as $time)
                        <option value="{{ $time->value }}">{{ __('application.time.' .$time->name) }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('education.time'){{ $message }}@enderror</span>
            </div>

            <div class="col-sm-4">
                <label class="form-label" for="begin_edu">{{ __('education.begin_edu') }} *</label>
                <input wire:model.blur="education.begin_edu" type="date" id="begin_edu" class="form-control"/>
                <span class="text-danger">@error('education.begin_edu'){{ $message }}@enderror</span>
            </div>

            <div class="col-sm-4">
                <label class="form-label" for="duration_edu">{{ __('education.duration_edu') }} *</label>
                <input wire:model.blur="education.duration_edu" type="number" id="duration_edu" class="form-control"/>
                <span class="text-danger">@error('education.duration_edu'){{ $message }}@enderror</span>
            </div>

            <div class="col-sm-4">
                <label class="form-label" for="start_semester">{{ __('education.start_semester') }} *</label>
                <input wire:model.blur="education.start_semester" type="number" id="start_semester"
                       class="form-control"/>
                <span class="text-danger">@error('education.start_semester'){{ $message }}@enderror</span>
            </div>


            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">
                    <span class="align-middle d-sm-inline-block d-none">{{ __('attributes.save') }}</span>
                </button>
            </div>
        </div>
    </div>
</form>
