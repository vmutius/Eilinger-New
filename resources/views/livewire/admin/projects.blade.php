<section class="home-section">
    <div class="text">{{  __('application.proj_overview')  }}</div>
    <p>{{  __('application.proj_overview_text')  }}</p>

    <div class="content">
        <div class="shadow p-3 mb-5 bg-body rounded">
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{  __('application.name')  }}</th>
                        <th>{{  __('application.area')  }}</th>
                        <th>{{  __('user.lastname')  }}</th>
                        <th>{{  __('user.firstname')  }}</th>
                        <th>{{  __('user.email')  }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applications as $application)
                        <tr>
                            <td>
                                <a href="{{ route('admin_antrag' , ['application_id' => $application->id, 'locale'=> app()->getLocale()]) }}">{{ $application->name }} ({{ $application->appl_status }})</a>
                            </td>
                            <td>{{ $application->bereich }}</td>
                            <td>{{ $application->user->lastname }}</td>
                            <td>{{ $application->user->firstname }}</td>
                            <td>{{ $application->user->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{  __('application.no_projects')  }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
            {{ $applications->links() }}
        </div>
    </div>
</section>


