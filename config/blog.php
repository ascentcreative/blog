<?php

return [

    'content_editor' => 'stackeditor',

    // URI Segment for publc site:
    'blog_path' => 'blog',
    'blog_title' => 'Blog',
    'blog_post_name' => 'post',
    'blog_disable_index' => false,

    'wrapper_blade' => 'cms.page.show',
    'post_show_blade' => 'blog::public.show',

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
