<?php

namespace AscentCreative\Blog\PageBuilder\ElementDescriptors;

use AscentCreative\PageBuilder\ElementDescriptors\AbstractDescriptor; 

class LatestPosts extends AbstractDescriptor { 

    public static $name = 'Latest Blog Posts';

    public static $bladePath = 'blog-latest';

    public static $description = "Shows the latest blog posts. Can be filtered by post type.";

    public static $category = "Blog";

}