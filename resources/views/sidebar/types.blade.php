@extends('cms::sidebar.panel.base')

@section('panel-header')
   Post Types
@overwrite

@section('panel-body')

    @foreach(AscentCreative\Blog\Models\Type::whereHas('posts')->orderBy('type')->get() as $type)
        {{ $type->linkWithCount }}
    @endforeach

@overwrite