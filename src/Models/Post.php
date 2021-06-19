<?php

namespace AscentCreative\Blog\Models;

use AscentCreative\CMS\Models\Base;
use AscentCreative\CMS\Traits\HasSlug;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Post extends Base
{
    use HasFactory, HasSlug;

    public $table = 'blog_posts';

    public $fillable = ['title', 'slug', 'publish_date', 'published', 'content', 'summary'];

    

}

