<div class="content post-grid">

    {{-- @dump($posts ?? '[]') --}}

    @foreach($posts as $post) 
        @includeFirst(['blog.post.indexitem', 'blog::post.indexitem'], ['post' => $post, 'matchHeight'=>true])
    @endforeach

    @if($value->paginate) 
    {{ $posts->links() }}
    @endif

</div>