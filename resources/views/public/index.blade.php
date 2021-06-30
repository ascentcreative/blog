@extends('blog::base')

@section('pagehead')
    <H1>{{ $title ?? 'BLOG' }}</H1>
@endsection

@section('pagecontent')

        <div class="contentgrid has-sidebar">

            <div class="content post-grid">

                @foreach($posts as $post) 
                    @includeFirst(['blog.post.indexitem', 'blog::post.indexitem'], ['post' => $post])
                @endforeach

            </div>

            {{ $posts->links() }}

            {{-- Should we really be wrapping all the panels in a div? --}}
            {{-- Might need to break out on mobile --}}
            {{-- Should we have upper and lower sidebars which break before and after content? --}}
            {{-- Would also mean the content only needs to span 2 rows?  --}}

            {{-- How do we tell a panel where it should display? --}}
            {{-- Different arrays? Flag on DB record? --}}
            <div class="sidebar" id="sidebar-top" xstyle="background: #efefef;">

               

                {{-- @foreach($model->panels('top')->get() as $panel)
                    {{ $panel->render() }}
                @endforeach --}}

            </div>

            <div class="sidebar" id="sidebar-bottom" sxtyle="background: #efefef;">

                @php 
                    foreach( config('blog.index_sidebar') as $cls) {
                        $panel = new $cls(); 
                        echo $panel->render();
                    }
                @endphp

                {{-- @foreach($model->panels('bottom')->get() as $panel)
                   {{ $panel->render() }}
                @endforeach --}}

            </div>

        </div>
       
    @endsection