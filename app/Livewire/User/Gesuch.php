<?php

namespace App\Livewire\User;

use App\Models\Application;
use App\View\Components\Layout\UserDashboard;
use Livewire\Component;

class Gesuch extends Component
{
    public function render()
    {
        $applications = Application::LoggedInUser()
            ->where('appl_status', '!=', 'not send')
            ->get();

        return view('livewire.user.gesuch', [
            'applications' => $applications,
        ])
            ->layout(UserDashboard::class);
    }
}
