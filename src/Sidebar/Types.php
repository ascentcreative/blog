<?php

namespace AscentCreative\Blog\Sidebar;

use AscentCreative\CMS\Sidebar\AbstractPanel as Base;

use AscentCreative\Blog\Models\Type;

class Types extends Base {

    public function __construct() {

    }

    public function isRenderable() {
        return true;
    }

    public function render() {

        return view('blog::sidebar.types');

    }

}