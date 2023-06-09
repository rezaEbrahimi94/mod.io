<?php

namespace App\Providers;

use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenRepositoryInterface;
use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenServiceInterface;
use App\Http\Controllers\ChallengeThree\Tokens\Repositories\TokenRepository;
use App\Http\Controllers\ChallengeThree\Tokens\Services\TokenService;
use Illuminate\Support\ServiceProvider;

class TokenServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TokenRepositoryInterface::class, TokenRepository::class);
        $this->app->bind(TokenServiceInterface::class, TokenService::class);    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
