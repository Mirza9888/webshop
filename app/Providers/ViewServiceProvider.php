<?php

namespace App\Providers;

use App\Models\Category;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;



class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        {
            View::composer('layouts.app', function ($view) {
                $categories = Category::with('children.products')->whereNull('parent_id')->get();
                Log::debug('Categories loaded', ['categories' => $categories]);
                $view->with('categories', $categories);

            });
        }
    }
}
