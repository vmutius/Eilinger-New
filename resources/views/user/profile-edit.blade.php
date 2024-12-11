<x-layout.user_dashboard>
    <section class="home-section">
        <h2>{{  __('userDashboard.profile')  }}</h2>
        <div class="home-content">
            <div class="shadow p-3 mb-5 bg-body rounded">
                <div class="col-md-12">
                    @include('partials.user-update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="home-content">
            <div class="shadow p-3 mb-5 bg-body rounded">
                <div class="col-md-12">
                    @include('partials.user-update-password-form')
                </div>
            </div>
        </div>
    </section>
</x-layout.user_dashboard>
