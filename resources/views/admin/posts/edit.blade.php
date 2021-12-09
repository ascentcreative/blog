@extends('cms::admin.base.edit')

@section('editform')

<div class="cms-screenblock cms-screenblock-main bg-white rounded shadow" style="">
   
    <div class="flex flex-nowrap">
        
        <div class="flex-grow" style="flex-grow: 1">
            
            <x-cms-form-input type="text" name="title" label="Title" value="{{ old('title', $model->title) }}">
                The title of the post
            </x-cms-form-input>

            <x-cms-form-foreignkeyselect type="select" name="type_id" label="Post Type" value="{{ old('type_id', $model->type_id) }}"
                :query="AscentCreative\Blog\Models\Type::query()" labelField="type" nullItemLabel="Please Select" sortField="type"
                >
            </x-cms-form-foreignkeyselect>

            <x-cms-form-pivotlist name="authors" label="Authors" :value="old('authors', $model->authors)"
                labelField="name"
                :optionRoute="action(['AscentCreative\Blog\Controllers\Admin\AuthorController', 'autocomplete'])"
                optionModel="AscentCreative\Blog\Models\Author"
                :dataval="$model->authors"
                sortField="sort"
                >    
            </x-cms-form-pivotlist>

            <x-cms-form-relatedtokens name="tags" label="Tags" value="{{ old('tags', $model->tags) }}" relationship="tags" />

            <x-cms-form-textarea name="summary" label="Summary" value="{{ old('summary', $model->summary) }}" />

        </div>

        @includeFirst($model->getTraitBlades('Publishable'))
        
        
    </div>

</div>

<div class="cms-screenblock-tabs bg-white rounded shadow" style="">


    <ul class="nav nav-tabs px-3 pt-3 bg-light" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="main-tab" data-toggle="tab" href="#page" role="tab" aria-controls="page" aria-selected="true">Post Content</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="headimg-tab" data-toggle="tab" href="#headimg" role="tab" aria-controls="headimg" aria-selected="false">Images</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" id="metadata-tab" data-toggle="tab" href="#metadata" role="tab" aria-controls="metadata" aria-selected="false">Metadata</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="extra-tab" data-toggle="tab" href="#extra" role="tab" aria-controls="extra" aria-selected="false">Extra</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show p-3" id="page" role="tabpanel" aria-labelledby="page-tab">

            @switch(config('cms.content_editor'))

                @case('ckeditor')
                    <x-cms-form-ckeditor type="text" label="Page Content" name="content" value="{{ old('content', $model->content) }}" height="500">

                    </x-cms-form-ckeditor>
                @break

                @case('stack')
                    <x-cms-form-stack label="TESTING" 
                    name="content" 
                    :value="old('content', $model->content)" 
                    wrapper="none"/>
                @break

                @case('stackeditor')
                    {{-- Used to prevent errors if the stackeditor package isn't installed --}}
                   @include('cms::stackeditor.proxy')
                @break


            @endswitch

            {{-- 
         --}}

         

            {{-- <x-cms-form-wysiwyg label="TESTING" name="content{{uniqid()}}" :value="old('content', $model->content)" wrapper="none"/> --}}

            


        </div>

       <div class="tab-pane show p-3" id="headimg" role="tabpanel" aria-labelledby="headimg-tab">

            @includeFirst($model->getTraitBlades('HasImages'))

        </div> 


        <div class="tab-pane show p-3" id="metadata" role="tabpanel" aria-labelledby="metadata-tab">

            @includeFirst($model->getTraitBlades('HasMetadata'))

        </div> 

        <div class="tab-pane show p-3" id="extra" role="tabpanel" aria-labelledby="extra-tab">
            @if(method_exists($model, 'getTraitBlades')) 
            @foreach($model->getTraitBlades() as $blade)
                {{-- <div class="cms-screenblock bg-white rounded shadow" style=""> --}}
                    @includefirst($blade)
                {{-- </div> --}}
            @endforeach
        @endif

        </div> 

    </div>

    
</div>


@endsection
