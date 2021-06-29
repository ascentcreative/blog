<?php

namespace AscentCreative\Blog\Models;

use AscentCreative\CMS\Models\Base;
use AscentCreative\CMS\Traits\HasSlug;
use AscentCreative\CMS\Traits\HasMetadata;
use AscentCreative\CMS\Traits\HasImages;
use AscentCreative\CMS\Traits\Publishable;

use AscentCreative\Blog\Models\Tag;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Post extends Base
{
    use HasFactory, HasSlug, HasImages, HasMetadata, Publishable;

    public $table = 'blog_posts';

    public $fillable = ['title', 'slug', 'publish_date', 'published', 'content', 'summary', 'type_id'];

    public $image_specs = ['blog-thumbnail'];

    public function getUrlAttribute() {
        return '/blog/' . $this->slug;
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'blog_post_tags');
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function authors() {
        return $this->belongsToMany(\AscentCreative\Blog\Models\Author::class, 'blog_post_authors')
                        ->withPivot('sort')->orderBy('sort');
    }

}

