<form wire:submit="saveCostDarlehen">
    @csrf
    <div class="content-header mb-3">
        <h3 class="mb-0">{{ __('cost.title_loan') }}</h3>
        <div class="d-flex justify-content-between">
            <div>
                <small>{{ __('cost.subtitle_loan') }}</small>
            </div>
        </div>
    </div>
    <div class="row g-3">

        <x-notification />
        @foreach ($costs as $index => $cost)
            <div class="row g-3">
                <div class="col-sm-5">
                    <label class="form-label" for="cost_name">{{ __('cost.cost') }}</label>
                    <input wire:model.blur="costs.{{ $index }}.cost_name" type="text" class="form-control" />
                    <span class="text-danger">
                        @error('costs.' . $index . '.cost_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-sm-5">
                    <label class="form-label" for="cost_amount">{{ __('cost.cost_amount') }}</label>
                    <input wire:model.blur="costs.{{ $index }}.cost_amount" type="number"
                        class="form-control" />
                    <span class="text-danger">
                        @error('costs.' . $index . '.cost_amount')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-danger btn-xs mt-4"
                        wire:click.prevent="delCostDarlehen({{ $index }})">
                        <span class='badge badge-success small'><i class="bi bi-trash3"></i></span>
                    </button>
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-secondary mt-4" wire:click.prevent="addCostDarlehen()">{{ __('cost.add_cost') }}
                </button>
            </div>
        </div>

        <hr class="border border-dark opacity-50">
        <div class="col-sm-12 text-end">
            <p>{{ __('cost.totalCosts') }} @convert($this->getAmountCostDarlehen(), $this->myCurrency->abbreviation)</p>
        </div>


        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">
                <span class="align-middle d-sm-inline-block d-none">{{ __('attributes.save') }}</span>
            </button>
        </div>
    </div>
</form>
