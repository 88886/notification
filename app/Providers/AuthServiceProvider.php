<?php

namespace App\Providers;

use App\Category;
use App\Policies\ViewPolicy;
use App\Service\AlipayService;
use App\Service\CategoryService;
use App\Service\IndexService;
use App\Service\OrderService;
use App\Service\TaskService;
use App\Service\VerficationService;
use App\Task;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Task::class => ViewPolicy::class,
        Category::class => ViewPolicy::class,
        TaskService::class => ViewPolicy::class,
        CategoryService::class => ViewPolicy::class,
        User::class => ViewPolicy::class,
        IndexService::class => ViewPolicy::class,
        OrderService::class => ViewPolicy::class,
        VerficationService::class => ViewPolicy::class,
        AlipayService::class => ViewPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
    }
}
