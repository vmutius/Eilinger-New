@php use App\Enums\CivilStatus; @endphp
<form wire:submit="saveUserNat">
    @csrf
    <div class="content-header mb-3">
        <h3 class="mb-0">{{ __('user.applicant') }}</h3>
        <div class="d-flex justify-content-between">
            <div>
                <small>{{ __('user.subtitle') }}</small>
            </div>
        </div>
    </div>

    <div class="row g-3">

        <x-notification />

        <div class="col-sm-2">
            <label for="salutation" id="salutation" class="form-label">{{ __('user.salutation') }} *</label>
            <select wire:model.blur="user.salutation" class="form-select">
                <option hidden>{{ __('attributes.please_select') }}</option>
                @foreach (App\Enums\Salutation::cases() as $salutation)
                    <option value="{{ $salutation }}">{{ __('user.salutation_name.' . $salutation->name) }}</option>
                @endforeach
            </select>
            @error('user.salutatiom')
                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-5">
            <label class="form-label" for="firstname">{{ __('user.firstname') }} *</label>
            <input wire:model.blur="user.firstname" type="text" class="form-control" />
            <span class="text-danger">
                @error('user.firstname')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-5">
            <label class="form-label" for="lastname">{{ __('user.lastname') }} *</label>
            <input wire:model.blur="user.lastname" type="text" class="form-control" />
            <span class="text-danger">
                @error('user.lastname')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="col-sm-2">
            <label class="form-label" for="country">{{ __('user.nationality') }} *</label>
            <select wire:model.blur="user.nationality" class="form-select">
                <option hidden>{{ __('attributes.please_select') }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->short_code }}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('user.nationality')
                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
            @enderror

        </div>
        <div class="col-sm-5">
            <label class="form-label" for="birthday">{{ __('user.birthday') }} *</label>
            <input wire:model.blur="user.birthday" type="date" id="birthday" class="form-control">
            <span class="text-danger">
                @error('user.birthday')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-md-5">
            <label class="form-label" for="civil_status">{{ __('user.civil_status') }} *</label>
            <select wire:model.blur="user.civil_status" class="form-select">
                <option hidden>{{ __('attributes.please_select') }}</option>
                @foreach (CivilStatus::cases() as $status)
                    <option value="{{ $status->value }}">{{ __('user.civil_status_name.' . $status->name) }} </option>
                @endforeach
            </select>
            @error('user.civil_status')
                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
            @enderror
        </div>
        @if ($this->partnerVisible)
            @livewire('antrag.parent-form')
        @endif

        <div class="col-md-4">
            <label class="form-label" for="phone">{{ __('user.phone') }}</label>
            <input wire:model.blur="user.phone" type="text" class="form-control" />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="mobile">{{ __('user.mobile') }}</label>
            <input wire:model.blur="user.mobile" type="text" class="form-control" />
        </div>
        <div class="col-md-4">
            <label class="form-label" for="soz_vers_nr">{{ __('user.soz_vers_nr') }}</label>
            <input wire:model.blur="user.soz_vers_nr" type="text" class="form-control" />
        </div>

        <div class="col-sm-6">
            <label class="form-label" for="in_ch_since">{{ __('user.in_ch_since') }}</label>
            <input wire:model.live="user.in_ch_since" type="date" class="form-control" />
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="granting">{{ __('user.granting') }}</label>
            <select wire:model.blur="user.granting" class="form-select">
                <option hidden>{{ __('attributes.please_select') }}</option>
                @foreach (App\Enums\Bewilligung::cases() as $granting)
                    <option value="{{ $granting->value }}">{{ __('user.permit_name.' . $granting->name) }}</option>
                @endforeach
            </select>
            @error('user.granting')
                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">
                <span class="align-middle d-sm-inline-block d-none">{{ __('attributes.save') }}</span>
            </button>

        </div>
    </div>
</form>
