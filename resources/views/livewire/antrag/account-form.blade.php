<form wire:submit="saveAccount">
    @csrf
    <div class="content-header mb-3">
        <h3 class="mb-0">{{ __('account.title') }}</h3>
        <div class="d-flex justify-content-between">
            <div>
                <small>{{ __('account.subtitle') }}</small>
            </div>
        </div>
    </div>
    <div class="row g-3">

        <x-notification />

        <div class="col-sm-6">
            <label class="form-label" for="name_bank">{{ __('account.name_bank') }} *</label>
            <input wire:model.blur="account.name_bank" type="text" class="form-control" />
            <span class="text-danger">
                @error('account.name_bank')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="city_bank">{{ __('account.city_bank') }} *</label>
            <input wire:model.blur="account.city_bank" type="text" class="form-control" />
            <span class="text-danger">
                @error('account.city_bank')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="owner">{{ __('account.owner') }} *</label>
            <input wire:model.blur="account.owner" type="text" class="form-control" />
            <span class="text-danger">
                @error('account.owner')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="IBAN">{{ __('account.IBAN') }} *</label>
            <input wire:model.blur="account.IBAN" type="text" class="form-control" />
            <span class="text-danger">
                @error('account.IBAN')
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
