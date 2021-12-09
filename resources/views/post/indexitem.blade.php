<div class="index-item post">


    @php 
    
        $spec = config('blog.image_specs.thumbnail');
        $test = imageUrl($spec, $post) 
        
    @endphp

    <A class="ii-post-thumbnail" style="background-image: url('{{ imageUrl($spec, $post)}}')" href="{{ route('blog.post', ['post'=>$post]) }}">

    </A>

    <div class="ii-post-info @if($matchHeight ?? false) matchHeight @endif">

        <div class="badge badge-primary">{{ $post->type->type ?? '' }}</div>

        <div class="ii-post-title"><A href="{{ route('blog.post', ['post'=>$post]) }}">{{ $post->title }}</A></div>

        <div class="ii-post-summary">{!! $post->summary !!}</div>
        
        <div class="small">
           
            {!! $post->authorLinks !!}
            
            {{ ($post->publish_start ?? $post->created_at)->toFormattedDateString() }}

            @if($post->tags->count() > 0)
                <div>
                    Tagged: {!! $post->tag_links !!}
                </div>
            @endif
           
        </div>

      

    </div>

</div>