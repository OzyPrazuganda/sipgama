<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    public function role(User $user)
    {
        return in_array($user->role, ['admin', 'pimpinan', 'bendahara']);
    }
}
