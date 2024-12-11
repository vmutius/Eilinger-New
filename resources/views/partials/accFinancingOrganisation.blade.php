<div class="accordion-item">
    <h2 class="accordion-header" id="headingFinancingOrganisation">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
            data-bs-target="#collapseFinancingOrganisation">{{ __('financing.title') }}
        </button>
    </h2>
    <div id="collapseFinancingOrganisation" class="accordion-collapse collapse">
        @if ($financingOrganisation)
            <div class="card-body">
                <div class=row>
                    @foreach ($financingOrganisation as $financing)
                        <div class="col-sm-6">
                            <p>{{ __('financing.financing_name') }}: {{ $financing->financing_name }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>{{ __('financing.financing_amount') }}: @convert($financing->financing_amount, $application->currency->abbreviation)</p>
                        </div>
                    @endforeach
                    <div class="col-12 text-end">
                        <p>{{ __('financing.total') }} @convert($this->getTotalFinancingOrganisation(), $application->currency->abbreviation)</p>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <div class=row>
                    <div class="col-sm-12">
                        <p>Keine Finanzierung eingetragen</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
