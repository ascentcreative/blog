<?php

return [

    // URI Segment for publc site:
    'blog_path' => 'blog',

    'wrapper_blade' => 'cms.page.show',

    'index_sidebar' => [
        'AscentCreative\Blog\Sidebar\Tags',
        'AscentCreative\Blog\Sidebar\Types',
    ],

    'post_sidebar' => [
        'AscentCreative\Blog\Sidebar\Tags',
        'AscentCreative\Blog\Sidebar\Types',
    ],

   
];
