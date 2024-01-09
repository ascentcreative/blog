@extends('pagebuilder::components.element.edit')

@section('content')

    <div class="flex flex-center" style="width: 100%">
        <H2 class="text-center" style="width: 100%; padding: 10px;">
            <x-forms-fields-wysiwyg :value="$value->title ?? ''" placeholder="Latest Blog Posts" label="" wrapper="none" name="{{$path}}[title]" toolbar="basic"/>
        </H2>
    </div>

    <div class="container">
        <x-cms-form-input type="text" label="Headline" :value="$value->headline ?? ''" name="{{ $path }}[headline]" />
    </div>

@overwrite