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

    public function posts() {
        return $this->belongsToMany(Post::class, 'blog_post_tags');
    }

    public function getLinkWithCountAttribute() {
        return view('blog::tag.link', ['tag'=>$this, 'count'=>true]);
    }

    public function getLinkAttribute() {
        return view('blog::tag.link', ['tag'=>$this, 'count'=>false]);
    }

}

