<section class="home-section">
    <div class="text">Benutzerübersicht</div>

    <div class="content">
        <div class="shadow p-3 mb-5 bg-body rounded">
            <div class="row">
                <div class="col-md-3">
                    <input wire:model.live="searchUsername" class="form-control" type="text"
                        placeholder="Suchen nach Benutzernamen">
                </div>
                <div class="col-md-3">
                    <input wire:model.live="searchUserEmail" class="form-control" type="text"
                        placeholder="Suchen nach Benutzer Email">
                </div>
                <div class="col-md-3">
                    <input wire:model.live="searchNameInst" class="form-control" type="text"
                        placeholder="Suchen nach Vereinsname">
                </div>
                {{-- <div class="col-md-3">
                   <input wire:model.live="searchStatusProject" class="form-control" type "text"
                   placeholder="Suchen nach Projekt Status">
               </div>  --}}
            </div>
            <hr class="border border-dark opacity-50">
            <div class="table-responsive">
                <table class="table table-striped" id="sortTable">
                    <thead>
                        <tr>
                            <th>Benutzername</th>
                            <th>Vereinsname</th>
                            <th>Nachname</th>
                            <th>Vorname</th>
                            <th>Email</th>
                            <th>Erstellt am</th>
                            <th>Anträge</th>
                            <th>Bereich</th>
                            <th>Erstellt am</th>
                            <th>Zuletzt bearbeitet am</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            @if ($user->sendApplications->count() < 2)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name_inst }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at ? $user->created_at->format('d.m.Y H:i') : null }}</td>
                                    @forelse ($user->sendApplications as $application)
                                        <td>
                                            <a
                                                href="{{ route('admin_antrag', ['application_id' => $application->id, 'locale' => app()->getLocale()]) }}">{{ $application->name }}</a>
                                        </td>
                                        <td>{{ $application->bereich->name }}</td>
                                        <td>{{ $application->created_at ? $application->created_at->format('d.m.Y H:i') : null }}
                                        </td>
                                        <td>{{ $application->updated_at ? $application->updated_at->format('d.m.Y H:i') : null }}
                                        </td>
                                        <td><span
                                                class="badge text-bg-{{ $application->appl_status_context }}">{{ __('application.status_name.' . $application->appl_status->name) }}</span>
                                        </td>
                                    @empty
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endforelse
                                </tr>
                            @else
                                <tr>
                                    <td rowspan="{{ $user->sendApplications->count() }}">{{ $user->username }}</td>
                                    <td rowspan="{{ $user->sendApplications->count() }}">{{ $user->name_inst }}</td>
                                    <td rowspan="{{ $user->sendApplications->count() }}">{{ $user->lastname }}</td>
                                    <td rowspan="{{ $user->sendApplications->count() }}">{{ $user->firstname }}</td>
                                    <td rowspan="{{ $user->sendApplications->count() }}">{{ $user->email }}</td>
                                    <td rowspan="{{ $user->sendApplications->count() }}">
                                        {{ $user->created_at ? $user->created_at->format('d.m.Y H:i') : null }}</td>
                                    @foreach ($user->sendApplications as $application)
                                        @if (!$loop->first)
                                <tr>
                            @endif
                            <td>
                                <a
                                    href="{{ route('admin_antrag', ['application_id' => $application->id, 'locale' => app()->getLocale()]) }}">{{ $application->name }}</a>
                            </td>
                            <td>{{ $application->bereich->name }}</td>
                            <td>{{ $application->created_at ? $application->created_at->format('d.m.Y H:i') : null }}
                            </td>
                            <td>{{ $application->updated_at ? $application->updated_at->format('d.m.Y H:i') : null }}
                            </td>
                            <td><span
                                    class="badge text-bg-{{ $application->appl_status_context }}">{{ $application->appl_status }}</span>
                            </td>
                            @if (!$loop->first)
                                </tr>
                            @endif
                        @endforeach
                        @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Keine Benutzer gefunden</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }}
            of total {{ $users->total() }} entries {{ $users->links() }}
        </div>
    </div>
</section>
