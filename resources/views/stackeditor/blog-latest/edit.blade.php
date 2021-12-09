@extends("stackeditor::block.base.edit")


@section('block-content')

<div class="flex flex-center" style="width: 100%">
    <H2 class="text-muted text-center" style="width: 100%;">LATEST BLOG POSTS</H2>
</div>

<div class="container">
   
    <x-cms-form-input type="text" label="Headline" :value="$value->headline ?? ''" name="{{ $name }}[headline]" />

</div>

@overwrite
