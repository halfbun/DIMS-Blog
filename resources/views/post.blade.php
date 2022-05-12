@extends('layouts.main')
@section('container')
<section id="single-post">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->category_name }}">
                </div>
                <h1 class="mb-3 text-center mt-5">{{ $post->title }}</h1>                
                <p class="text-center post-author">{{ $post->created_at->format('M d, Y') }} BY <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none fw-bold text-black"> {{ $post->author->name }}</a></p>                    
                <article class="my-3 fs-5 mx-5">
                    <p class="post-content drop-cap large">{!!   $post->isi_post   !!}</p>   
                </article>
                          
        </div>
    </div>
</div>
</section>
@endsection
