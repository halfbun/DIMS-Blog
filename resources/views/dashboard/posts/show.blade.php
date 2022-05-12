@extends('dashboard.layouts.main')

@section('container')

<div class="container bg-white p-5" style="box-sizing: border-box">
    <div class="row">
        <div class="col-lg-12">
<div class="mb-3">
    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
    </form>
</div>
            <h1 class="mb-3">{{ $post->title }}</h1>
                @if ($post->image )
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3" alt="{{ $post->category->category_name }}">
                    </div>                    
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->category_name }}" class="img-fluid mt-3" alt="{{ $post->category->category_name }}">
                @endif
                {{-- !! digunakan agar data tags html dalam database tidak escape --}}
                <article class="my-3 fs-5">
                    {!! $post->isi_post !!}   
                </article>
          
        </div>
    </div>
</div>

@endsection