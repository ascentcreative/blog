<?php

namespace AscentCreative\Blog\PageBuilder\ElementDescriptors;

use AscentCreative\PageBuilder\ElementDescriptors\AbstractDescriptor; 

class BlogIndex extends AbstractDescriptor { 

    public static $name = 'Blog Index';

    public static $bladePath = 'blog-index';

    public static $description = "Main blog article grid with sidebar filter";

    public static $category = "Blog";

    public static function getViewData($value, $mode):array {
        
        $postsQry = app('AscentCreative\Blog\Models\Post')::query();

        if($value->post_types ?? null) {
            $postsQry = $postsQry->whereIn('type_id', $value->post_types);
        }
                           

        if($value->post_count ?? false) {
            $posts = $postsQry->paginate($value->post_count);
        } else {
            $posts = $postsQry->get();
        }
                            


        return [
            'posts' => $posts
        ];
    }

}