<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        view()->composer('layouts.sidebar', function($view){
            $categories = Category::with(['posts' => function($query){
                $query->published();
            }])->orderBy('title', 'asc')->get();

            return $view->with('categories', $categories);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
