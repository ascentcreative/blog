@extends('cms::sidebar.panel.base')

@section('panel-header')
   Tags
@overwrite

@section('panel-body')

    @foreach(AscentCreative\Blog\Models\Tag::whereHas('posts')->orderBy('tag')->get() as $tag)
        {{ $tag->linkWithCount }}
    @endforeach

@overwrite