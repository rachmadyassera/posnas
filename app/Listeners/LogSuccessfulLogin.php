<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login; // <- PENTING: import yang benar

class LogSuccessfulLogin
{
    public function handle(Login $event): void
    {
        $user = $event->user ?? null;

        activity()
            ->causedBy($user)
            ->withProperties([
                'ip' => request()->ip(),
                'user_agent' => request()->header('User-Agent'),
            ])
            ->log('User login ke sistem');
    }
}
