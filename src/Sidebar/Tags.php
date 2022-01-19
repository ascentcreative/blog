<?php

namespace AscentCreative\Blog\Sidebar;

use AscentCreative\CMS\Sidebar\AbstractPanel as Base;

use AscentCreative\Blog\Models\Tag;

class Tags extends Base {

    public function __construct() {

    }

    public function isRenderable() {
        // return true;
        return Tag::whereHas('posts')->count() > 0;
    }

    public function render() {
        
        if($this->isRenderable()) { 
            return view('blog::sidebar.tags');
        }

    }

}