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


    public function posts() {
        return $this->belongsToMany(Post::class, 'blog_post_authors');
    }


    public function getLinkWithCountAttribute() {
        return view('blog::author.link', ['author'=>$this, 'count'=>true]);
    }

    public function getLinkAttribute() {
        return view('blog::author.link', ['author'=>$this, 'count'=>false]);
    }

}

