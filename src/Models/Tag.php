<?php

namespace AscentCreative\Blog\Models;

use AscentCreative\CMS\Models\Base;
use AscentCreative\CMS\Traits\HasSlug;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Tag extends Base
{
    use HasFactory, HasSlug;

    public $table = 'blog_tags';

    public $fillable = ['tag', 'slug'];

    public $slug_source = 'tag';

}

