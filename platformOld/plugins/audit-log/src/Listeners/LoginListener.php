<?php

namespace Botble\AuditLog\Listeners;

use Botble\ACL\Models\User;
use Botble\AuditLog\Models\AuditHistory;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class LoginListener
{
    public function __construct(protected AuditHistory $auditHistory, protected Request $request)
    {
    }

    public function handle(Login $event): void
    {
        $user = $event->user;

        if ($user instanceof User) {
            $this->auditHistory->user_agent = $this->request->userAgent();
            $this->auditHistory->ip_address = $this->request->ip();
            $this->auditHistory->module = 'to the system';
            $this->auditHistory->action = 'logged in';
            $this->auditHistory->user_id = $user->id;
            $this->auditHistory->reference_user = 0;
            $this->auditHistory->reference_id = $user->id;
            $this->auditHistory->reference_name = $user->name;
            $this->auditHistory->type = 'info';

            $this->auditHistory->save();
        }
    }
}
