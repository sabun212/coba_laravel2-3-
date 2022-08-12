@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5 ">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $post-> title}}</h2>

            <p>By. <a class="text-decoration-none" href="/posts?author={{ $post->author->name }}">{{ $post->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

            @if ($post->image)
            {{-- <div style="max-height: 350px; overflow:hidden"> --}}
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->category->name }} " class="img-fluid mt-4">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }} " class="img-fluid mt-4">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>

            <a class="text-decoration-none d-block " href="/posts">back to posts</a>

        </div>
    </div>
</div>






@endsection
