@extends('layouts.base')

@section('title')
    {{ $blog->title }}
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">{{ $blog->title }}</h2>
                <p class="blog-post-meta">{{  Carbon\Carbon::parse($blog->updated_at)->format('M d Y H:i') }}</p>
                <p>{{ $blog->post  }}</p>
            </div>


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
