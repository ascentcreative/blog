<?php

namespace AscentCreative\Blog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use Illuminate\Database\Eloquent\Model;

class BlogController extends Controller
{


    /* even though the page model is defined here, the bindings swap the class at runtime */
    public function index() {

        headTitle()->add('Blog'); //$page->title);

        // if (request()->wantsJson()) {
        //     return view('blog::index')->withModel($page);
        // } else {
             return view('blog::public.index'); //->withModel($page);
        //}
    
    }



    /* even though the page model is defined here, the bindings swap the class at runtime */
    public function show(\AscentCreative\Blog\Models\Post $post) {

        // dd($post);
        headTitle()->add($post->title);

        // if (request()->wantsJson()) {
        //     return view('cms::public.pages.modal')->withModel($post);
        // } else {
            return view('blog::public.show')->withModel($post);
       // }
    
    }


    public function section(\AscentCreative\Blog\Models\Post $post) {
        return 'Section';
    }

}
