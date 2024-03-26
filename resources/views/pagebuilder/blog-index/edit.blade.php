@extends('pagebuilder::components.element.edit')

@php
    $formclass = \AscentCreative\Blog\PageBuilder\Forms\BlogIndexSettings::class;
@endphp

@section('content')

    <div class="flex flex-center" style="width: 100%">
        <H2 class="text-center" style="width: 100%; padding: 10px;">
           Blog Index Grid
        </H2>
    </div>

@overwrite