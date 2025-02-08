<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\History;
use App\Policies\HistoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        History::class => HistoryPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}