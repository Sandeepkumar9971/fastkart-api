<?php

namespace App\Providers;

use App\Models\Tag;
use App\Enums\RoleEnum;
use App\Models\Category;
use App\Models\Shipping;
use App\Policies\TagPolicy;
use App\Models\ShippingRule;
use App\Policies\BlogPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\StorePolicy;
use App\Policies\ThemePolicy;
use App\Models\AttributeValue;
use App\Policies\ProductPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ShippingPolicy;
use App\Policies\AttributePolicy;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\Policies\ShippingRulePolicy;
use App\Policies\AttributeValuePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Attribute::class => AttributePolicy::class,
        AttributeValue::class => AttributeValuePolicy::class,
        Blog::class => BlogPolicy::class,
        Category::class => CategoryPolicy::class,
        Product::class => ProductPolicy::class,
        Store::class => StorePolicy::class,
        Theme::class => ThemePolicy::class,
        Tag::class => TagPolicy::class,
        Category::class => CategoryPolicy::class,
        Shipping::class => ShippingPolicy::class,
        ShippingRule::class => ShippingRulePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        // Implicitly grant "Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole(RoleEnum::ADMIN) ? true : null;
        });
    }
}
