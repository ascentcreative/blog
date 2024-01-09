@extends('pagebuilder::components.element.show')

@section('content')

<div class="text-center"> <h2>{!! $value->title ?? 'Latest Posts' !!}</h2> </div>

@php
    
    $posts = AscentCreative\Blog\Models\Post::limit(4)->get();

@endphp

<div class="flex" style="width: 100%">

    <div style="flex: 1 0 400px; flex-wrap: wrap" class="latest-post p-3">
        @include('blog::post.indexitem', ['post'=>$posts->shift()] )
    </div>

    <div style="flex: 1 0 400px;  flex-wrap: wrap" class="p-3">
        {{-- <H3>Previous posts</H3> --}}

        <UL>
            @foreach($posts as $post)
                <li class="pt-3">
                    <a href="{{ route('blog.post', ['post'=>$post]) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </UL>

    </div>

</div>

<div class="flex-center flex p-3">
    <A href="{{ route('blog.home') }}" class="btn button btn-primary">View all {{ Str::plural(config('blog.blog_post_name')) }}</A>
</div>


@overwrite
