<?php

namespace App\Providers;

use App\Contracts\LeadScoringServiceInterface;
use App\Repositories\LeadRepository;
use App\Repositories\LeadRepositoryInterface;
use App\Services\LeadScoringService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LeadRepositoryInterface::class, LeadRepository::class);
        $this->app->bind(LeadScoringServiceInterface::class, LeadScoringService::class);
    }

    public function boot()
    {
        JsonResource::withoutWrapping();
    }
}
