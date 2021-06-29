<?php

namespace AscentCreative\Blog\Models;

use AscentCreative\CMS\Models\Base;
use AscentCreative\CMS\Traits\HasSlug;
use AscentCreative\CMS\Traits\HasImages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Author extends Base
{
    use HasFactory, HasSlug, HasImages;

    public $table = 'blog_authors';

    public $slug_source = 'name';

    public $image_specs = ['blog-author'];

    public $fillable = ['name', 'slug', 'bio'];

}

