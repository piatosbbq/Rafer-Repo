<?php

namespace App\Providers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserService::class, function($app) {
            $users = [
                [
                    'id' => 2201010,
                    'name' => 'John Doe',
                    'gender' => 'male'
                ],
                [
                    'id' => 2201011,
                    'name' => 'Britney Rafer',
                    'gender' => 'female'
                ],
                [
                    'id' => 2201012,
                    'name' => 'Jane Doe',
                    'gender' => 'female'
                ],
                [
                    'id' => 2201013,
                    'name' => 'Mariel Perin',
                    'gender' => 'female'
                ],
                [
                    'id' => 2201014,
                    'name' => 'Francis Luis',
                    'gender' => 'male'
                ],
                [
                    'id' => 2201015,
                    'name' => 'Christian Azarcon',
                    'gender' => 'male'
                ],
            ];

            return new UserService($users);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
