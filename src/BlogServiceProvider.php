<?php

namespace AscentCreative\Blog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Routing\Router;

use Illuminate\Pagination\Paginator;

class BlogServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
   
    $this->mergeConfigFrom(
        __DIR__.'/../config/blog.php', 'blog'
    );

    $this->mergeConfigFrom(
        __DIR__.'/../config/blog.models.php', 'blog.models'
    );

    $aliases = array();

    // subclassable models:
    // For each model:
    // 1) Set up an alias for the Facade (allows Page::method() calls)
    $aliases['Post'] = \AscentCreative\Blog\Facades\PostFacade::class;

    // 2) resolve the key in getFacadeAccessor()
    $this->app->bind('post',function(){
        $cls = config('blog.models.post');
        return new $cls();
    });

    // 3) Use Interface/Implementation binding to allow TypeHinting to resolve the right class.
    $this->app->bind(\AscentCreative\Blog\Models\Post::class, $cls = config('blog.models.post'));

    // bind the aliases...
    $loader = \Illuminate\Foundation\AliasLoader::getInstance($aliases);

  }

  public function boot()
  {

    Paginator::useBootstrapFour();

    $this->bootPublishes();

    $this->loadViewsFrom(__DIR__.'/../resources/views', 'blog');

    $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    $this->bootAssets();

    
  }

  

  // register the components
  public function bootComponents() {

  }


  /**
   * inject required css / js into main view stacks
   * 
   * @return [type]
   */
  public function bootAssets() {

       app('AscentCreative\CMS\Helpers\PackageAssets')
            ->addStylesheet('/vendor/ascent/blog/css/ascent-blog-core.css');

  }

  

    public function bootPublishes() {

      $this->publishes([
        __DIR__.'/Assets' => public_path('vendor/ascent/blog'),
    
      ], 'public');

      $this->publishes([
        __DIR__.'/../config/blog.php' => config_path('blog.php'),
      ]);

      $this->publishes([
        __DIR__.'/../config/blog.models.php' => config_path('blog.models.php'),
      ]);

    }



}