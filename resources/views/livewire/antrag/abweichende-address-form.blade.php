<form wire:submit="saveAbweichendeAddress">
    @csrf
    <div class="content-header mb-3">
        <h3 class="mb-0">{{ __('address.titleWochen') }}</h3>
        <div class="d-flex justify-content-between">
            <div>
                <small>{{ __('address.subTitleWochen') }}</small>
            </div>
        </div>
    </div>
    <div class="row g-3">

        <x-notification />

        <div class="col-md-6">
            <label class="form-label" for="street">{{ __('address.street') }} *</label>
            <input wire:model.blur="abweichendeAddress.street" type="text" class="form-control" />
            <span class="text-danger">
                @error('abweichendeAddress.street')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="number">{{ __('address.number') }}</label>
            <input wire:model.blur="abweichendeAddress.number" type="text" class="form-control" />
        </div>
        <div class="col-md-5">
            <label class="form-label" for="plz">{{ __('address.plz') }} *</label>
            <input wire:model.blur="abweichendeAddress.plz" type="text" class="form-control" />
            <span class="text-danger">
                @error('abweichendeAddress.plz')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-md-5">
            <label class="form-label" for="town">{{ __('address.town') }} *</label>
            <input wire:model.blur="abweichendeAddress.town" type="text" class="form-control" />
            <span class="text-danger">
                @error('abweichendeAddress.town')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="col-sm-2">
            <label class="form-label" for="country">{{ __('address.country') }} *</label>
            <select wire:model.blur="abweichendeAddress.country_id" class="form-select">
                <option hidden>{{ __('attributes.please_select') }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <span class="text-danger">
                @error('abweichendeAddress.country_id')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">
                <span class="align-middle d-sm-inline-block d-none">{{ __('attributes.save') }}</span>
            </button>
        </div>
    </div>
</form>
