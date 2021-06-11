<?php

namespace AscentCreative\Blog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Routing\Router;

class BlogServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
   
    $this->mergeConfigFrom(
        __DIR__.'/config/blog.php', 'blog'
    );

  }

  public function boot()
  {

    $this->loadViewsFrom(__DIR__.'/resources/views', 'blog');

    $this->loadRoutesFrom(__DIR__.'/routes/web.php');

    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    
  }

  

  // register the components
  public function bootComponents() {

  }




  

    public function bootPublishes() {

      $this->publishes([
        __DIR__.'/Assets' => public_path('vendor/ascent/blog'),
    
      ], 'public');

      $this->publishes([
        __DIR__.'/config/blog.php' => config_path('blog.php'),
      ]);

    }



}