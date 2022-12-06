<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // $columns = DB::getSchemaBuilder()->getColumnListing('permissions');
        // $permissions = 0;

        // foreach ($columns as $column) {

        //     Gate::define($column, function (User $user) use ($column, $permissions) {

        //         if (!$permissions) {
        //             $permissions =  $user->permissions->getPermissions($user->id)->first()->toArray();
        //         }

        //         foreach ($permissions as $name => $value) {
        //             if ($name == $column) {
        //                 if ($value != 2) {
        //                     return true;
        //                 }
        //                 return false;
        //             }
        //         }
        //     });
        // }
    }
}
