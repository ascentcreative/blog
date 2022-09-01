<?php

namespace AscentCreative\Blog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use AscentCreative\Blog\Models\Author;
use AscentCreative\Blog\Models\Tag;
use AscentCreative\Blog\Models\Type;
use AscentCreative\Blog\Models\Post;

use Illuminate\Support\Str;

class BlogController extends Controller
{


    public function index() {

        headTitle()->add(config('blog.blog_title') ?? 'Blog'); //$page->title);

        $posts = app('AscentCreative\Blog\Models\Post')::paginate(12);
        return view('blog::public.index')->with('posts', $posts); //->withModel($page);
      
    
    }


    public function tag(Tag $tag) {

        $title = 'Posts tagged "' . $tag->tag . '"';
        headTitle()->add($title);

        $posts = app('AscentCreative\Blog\Models\Post')::whereHas('tags', function($query) use ($tag) {
             $query->where('slug', $tag->slug);
        })->paginate(12);

        return view('blog::public.index')->with('posts', $posts)->with('title', $title);

    }


    public function type(Type $type) {

        // $title = 'Posts of type "' . $type->type . '"';
        $title = Str::plural($type->type);
        headTitle()->add($title);

        $posts = app('AscentCreative\Blog\Models\Post')::whereHas('type', function($query) use ($type) {
             $query->where('slug', $type->slug);
        })->paginate(12);

        return view('blog::public.index')->with('posts', $posts)->with('title', $title); 

    }

    public function author(Author $author) {

        $title = 'Posts by ' . $author->name;
        headTitle()->add($title);

        $posts = app('AscentCreative\Blog\Models\Post')::whereHas('authors', function($query) use ($author) {
             $query->where('slug', $author->slug);
        })->paginate(12);

        return view('blog::public.index')->with('posts', $posts)->with('title', $title); 

    }



    /* even though the page model is defined here, the bindings swap the class at runtime */
    public function show(Post $post) {

        headTitle()->add($post->title);
        return view('blog::public.show')->withModel($post);
    
    }


}
