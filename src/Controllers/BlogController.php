<?php

namespace AscentCreative\Blog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use AscentCreative\Blog\Models\Tag;
use AscentCreative\Blog\Models\Type;
use AscentCreative\Blog\Models\Post;

class BlogController extends Controller
{


    /* even though the page model is defined here, the bindings swap the class at runtime */
    public function index() {

        headTitle()->add('Blog'); //$page->title);


        // if (request()->wantsJson()) {
        //     return view('blog::index')->withModel($page);
        // } else {

        $posts = Post::paginate(12);
        return view('blog::public.index')->with('posts', $posts); //->withModel($page);
        //}
    
    }


    public function tag(Tag $tag) {

        $title = 'Posts tagged "' . $tag->tag . '"';
        headTitle()->add($title);

        $posts = Post::whereHas('tags', function($query) use ($tag) {
             $query->where('slug', $tag->slug);
        })->paginate(12);

        return view('blog::public.index')->with('posts', $posts)->with('title', $title);

    }


    public function type(Type $type) {

        $title = 'Posts of type "' . $type->type . '"';
        headTitle()->add($title);

        $posts = Post::whereHas('type', function($query) use ($type) {
             $query->where('slug', $type->slug);
        })->paginate(12);

        return view('blog::public.index')->with('posts', $posts)->with('title', $title); 

    }



    /* even though the page model is defined here, the bindings swap the class at runtime */
    public function show(Post $post) {

        // dd($post);
        headTitle()->add($post->title);

        // if (request()->wantsJson()) {
        //     return view('cms::public.pages.modal')->withModel($post);
        // } else {
            return view('blog::public.show')->withModel($post);
       // }
    
    }


}
