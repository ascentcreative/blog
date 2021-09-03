@extends('cms::admin.base.edit')

@section('editform')

<div class="cms-screenblock cms-screenblock-main bg-white rounded shadow" style="">
   
    <div class="flex flex-nowrap">
        
        <div class="flex-grow" style="flex-grow: 1">
            
            <x-cms-form-input type="text" name="type" label="Title" value="{{ old('type', $model->type) }}">
                The label for the Type
            </x-cms-form-input>

          

        </div>

 
        
    </div>

</div>



@endsection
