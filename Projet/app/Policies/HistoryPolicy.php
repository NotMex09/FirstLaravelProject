<?php

namespace App\Policies;

use App\Models\History;
use App\Models\User;

class HistoryPolicy
{
    public function delete(User $user, History $history)
    {
        return $user->id === $history->user_id;
    }
}