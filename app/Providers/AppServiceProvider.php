<?php

namespace App\Providers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Builder::macro('search', function ($fields, $string) {
            if ($string) {
                foreach ($fields as $field) {
                    $data = $this->orWhere($field, 'like', '%' . $string . '%')->get();
                }
            } else {
                return $this;
            }
        });
    }
}
