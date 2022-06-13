<?php

return [

    // URI Segment for publc site:
    'blog_path' => 'blog',
    'blog_title' => 'Blog',
    'blog_post_name' => 'post',

    'wrapper_blade' => 'cms.page.show',

    'index_sidebar' => [
        'AscentCreative\Blog\Sidebar\Tags',
        'AscentCreative\Blog\Sidebar\Types',
    ],

    'post_sidebar' => [
        'AscentCreative\Blog\Sidebar\Tags',
        'AscentCreative\Blog\Sidebar\Types',
    ],

    'image_specs' => [
        'header' => 'blog-header',
        'thumbnail' => 'blog-thumbnail'
    ]

   // Test
];
