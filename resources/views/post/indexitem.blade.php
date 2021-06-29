<div class="index-item post">

    @php $test = imageUrl('blog-thumbnail', $post) @endphp

    <A class="ii-post-thumbnail" style="background-image: url('{{ imageUrl('blog-thumbnail', $post)}}')" href="{{ $post->url }}">

    </A>

    <div class="ii-post-info matchHeight">

        <div class="badge badge-primary">{{ $post->type->type ?? '' }}</div>

        <div class="ii-post-title"><A href="{{ $post->url }}">{{ $post->title }}</A></div>

        <div class="ii-post-summary">{!! $post->summary !!}</div>
        
        <div class="small">
           
            {{ $post->authorNames }} 
            
            {{ ($post->publish_start ?? $post->created_at)->toFormattedDateString() }}

            @if($post->tags->count() > 0)
                <div>
                    Tagged: 
                    @foreach($post->tags as $tag)
                        <A class="tag" href="/blog/tag/{{$tag->slug}}">{{$tag->tag}}</A>
                    @endforeach
                </div>
            @endif
           
        </div>

      

    </div>

</div>