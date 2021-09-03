<?php

namespace AscentCreative\Blog\Models;

use AscentCreative\CMS\Models\Base;
use AscentCreative\CMS\Traits\HasSlug;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Type extends Base
{
    use HasFactory, HasSlug;

    public $table = 'blog_types';

    public $fillable = ['type', 'slug'];

    public $slug_source = 'type';


    public function posts() {
        return $this->hasMany(Post::class);
    }


    public function getLinkWithCountAttribute() {
        return view('blog::type.link', ['type'=>$this, 'count'=>true]);
    }

    public function getLinkAttribute() {
        return view('blog::type.link', ['type'=>$this, 'count'=>false]);
    }


}

