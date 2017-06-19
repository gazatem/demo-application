@extends('layouts.base')

@section('content')


    <div class="blog-header">
        <h1 class="blog-title">{{ $category->name }}</h1>

    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">

            @foreach($blogs as $post)

                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="{{ URL::to('/posts/' . $post->id) }}">{{ $post->title  }}</a></h2>
                    <p class="blog-post-meta">{{  Carbon\Carbon::parse($post->updated_at)->format('M d Y H:i') }}</p>
                    <p>{{ $post->post  }}</p>
                </div>
            @endforeach

            {!! $blogs->render() !!}

        </div>
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module">
                <h4>Categories</h4>
                <ol class="list-unstyled">
                    @foreach($categories as $category)
                        <li><a href="{{ URL::to('/categories/' . $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@stop
