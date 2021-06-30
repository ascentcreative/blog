<?php

namespace AscentCreative\Blog\Sidebar;

use AscentCreative\CMS\Sidebar\AbstractPanel as Base;

use AscentCreative\Blog\Models\Tag;

class Tags extends Base {

    public function __construct() {

    }

    public function isRenderable() {
        return true;
    }

    public function render() {

        return view('blog::sidebar.tags');

    }

}