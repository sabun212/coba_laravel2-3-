@extends('dashboard.layouts.main')


@section('container')

<div class="container">
    <div class="row  my-3 ">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $post-> title}}</h2>

            <div class="mb-4">
                <a href="/dashboard/posts" class="badge bg-success text-decoration-none">Back To ALL My Post<span data-feather="arrow-left text-decoration-none"></span></a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning text-decoration-none">Edit<span data-feather="edit"></span></a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('yang bener?')">Delete<span data-feather="x-circle"></span></button>
                </form>
            </div>

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



        </div>
    </div>
</div>

@endsection
