@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                
                <p>By. <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->category_name }}</a></p>
                @if ($post->image )
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->category_name }}">
                </div>                    
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->category_name }}" class="img-fluid" alt="{{ $post->category->category_name }}">
                @endif
                <article class="my-3 fs-5">
                    {!! $post->isi_post !!}   
                </article>
                
            <a href="/blog" class="d-block mt-2 text-decoration-none">Back to Blog</a>            
        </div>
    </div>
</div>

@endsection

{{-- <article class="mt-5">
    <h2>{{ $post->title }}</h2>
    
    <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->category_name }}</a></p>
    {!! $post->isi_post !!}
</article>    

<a href="/blog" class="d-block mt-2 text-decoration-none">Back to Blog</a> --}}
