<?php

namespace AscentCreative\Blog\Sidebar;

use AscentCreative\CMS\Sidebar\AbstractPanel as Base;

use AscentCreative\Blog\Models\Type;

class Types extends Base {

    public function __construct() {

    }

    public function isRenderable() {
        return Type::whereHas('posts')->count() > 0;
    }

    public function render() {

        if($this->isRenderable()) { 
            return view('blog::sidebar.types');
        }

    }

}