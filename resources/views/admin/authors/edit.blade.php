@extends('cms::admin.base.edit')

@section('editform')

<div class="cms-screenblock cms-screenblock-main bg-white rounded shadow" style="">
   
    <div class="flex flex-nowrap">
        
        <div class="flex-grow" style="flex-grow: 1">
            
            <x-cms-form-input type="text" name="name" label="Name" value="{{ old('name', $model->name) }}">
                The name of the Author
            </x-cms-form-input>

            <x-cms-form-ckeditor type="text" label="Biography" name="bio" value="{{ old('bio', $model->bio) }}" height="150">

            </x-cms-form-ckeditor>

            @includeFirst($model->getTraitBlades('HasImages'))
           
        </div>

        
        
    </div>

</div>

@endsection
