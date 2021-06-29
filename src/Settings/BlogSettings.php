<?php

namespace AscentCreative\Blog\Settings;

use Spatie\LaravelSettings\Settings;

class BlogSettings extends Settings
{

    /* main */
    public ?string $path_segment;
    public ?string $default_author;
    
    public static function group(): string
    {
        return 'blog';
    }

}