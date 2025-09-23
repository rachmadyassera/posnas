<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout; // <- pastikan import dari Illuminate

class LogSuccessfulLogout
{
    public function handle(Logout $event): void
    {
        // catat aktivitas logout
        activity()
            ->causedBy($event->user)
            ->log('User logout dari sistem');
    }
}
