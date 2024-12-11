<form wire:submit="saveUserNat">
    @csrf
    <div class="content-header mb-3">
        <h3 class="mb-0">{{ __('user.candidate') }}</h3>
        <div class="d-flex justify-content-between">
            <div>
                <small>{{ __('user.subTitleCandidate') }}</small>
            </div>
        </div>
    </div>

    <div class="row g-3">

        <x-notification />

        <div class="col-sm-2">
            <label class="form-label" for="user.salutation">{{ __('user.salutation') }}*</label>
            <select wire:model.blur="user.salutation" class="form-select" id="user.salutation">
                <option hidden>{{ __('attributes.please_select') }}</option>
                @foreach (App\Enums\Salutation::cases() as $salutation)
                    <option value="{{ $salutation }}">{{ $salutation }}</option>
                @endforeach
            </select>
            @error('user.salutatiom')
                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-sm-5">
            <label class="form-label" for="user.firstname">{{ __('user.firstname') }}*</label>
            <input wire:model.blur="user.firstname" type="text" class="form-control" id="user.firstname" />
            <span class="text-danger">
                @error('user.firstname')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-5">
            <label class="form-label" for="user.lastname">{{ __('user.lastname') }}*</label>
            <input wire:model.blur="user.lastname" type="text" class="form-control" id="user.lastname" />
            <span class="text-danger">
                @error('user.lastname')
                    {{ $message }}
                @enderror
            </span>
        </div>


        <div class="col-sm-2">
            <label for="user.birthday" class="form-label">{{ __('user.birthday') }}*</label>
            <input wire:model.live="user.birthday" type="date" class="form-control" id="user.birthday">
            <span class="text-danger">
                @error('user.birthday')
                    {{ $message }}
                @enderror
            </span>
        </div>


        <div class="col-md-5">
            <label class="form-label" for="user.phone">{{ __('user.phone') }}</label>
            <input wire:model.blur="user.phone" type="text" class="form-control" id="user.phone" />
        </div>
        <div class="col-md-5">
            <label class="form-label" for="user.mobile">{{ __('user.mobile') }}</label>
            <input wire:model.blur="user.mobile" type="text" class="form-control" id="user.mobile" />
        </div>

        <div class="col-md-12">
            <label class="form-label" for="user.contact_aboard">{{ __('user.contact_aboard') }}</label>
            <input wire:model.blur="user.contact_aboard" type="text" class="form-control" id="user.contact_aboard" />
        </div>


        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">
                <span class="align-middle d-sm-inline-block d-none">{{ __('attributes.save') }}</span>
            </button>

        </div>
    </div>
</form>
