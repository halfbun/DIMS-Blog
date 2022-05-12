@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

{{-- search bar --}}
<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/blog" >
      @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">  
      @endif
      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">  
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
        <button class="btn btn-danger" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>
{{-- end search bar --}}

{{-- jumbotron --}}
@if ($posts->count())
<div class="card mb-3">
  @if ($posts[0]->image )
  <div style="max-height: 350px; overflow:hidden;">
      <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid" alt="{{ $posts[0]->category->category_name }}">
  </div>                    
  @else
  <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->category_name }}" class="card-img-top" alt="{{ $posts[0]->category->category_name }}">
  @endif
    <div class="card-body text-center">
      <h3 class="card-title"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</h3></a><p>
          <small class="text-muted"> 
              By. <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name  }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->category_name }}</a>
              {{ $posts[0]->created_at->diffForHumans() }}
          </small>
      </p>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
    </div>
  </div>
{{-- end jumbotron --}}

{{-- blogpost --}}
<div class="container">
  <div class="row">
    @foreach ($posts->skip(1) as $post)

    <div class="col-md-4 mb-3">
      @if($loop->iteration % 2 == 0)      
      <div class="card">
        @else
        <div class="card bg-dark">
        @endif
        <div class="position-absolute px-3 py-2 text-white" style="background:rgba(0,0,0,0.7)"><a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->category_name }}</a></div>
        @if ($post->image )
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->category_name }}">                   
        @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->category_name }}" class="card-img-top" alt="{{ $post->category->category_name }}">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p>
            By. <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name  }}</a> {{ $post->created_at->diffForHumans() }}
          </p>
          <p class="card-text">{{ $post["excerpt"] }}</p>
          <a href="/post/{{ $post->slug }}" class="btn btn-primary"><i class="bi bi-arrow-right"></i> Read more</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
{{-- end blogpost --}}

<section id="blogpost">
  <div class="row dark">
      <div class="col-5 card-content">
          <h4>ILLUSTRATION</h4>
          <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, maxime.</h2>
          <div class="soc-icon">
              <button><a href="#"><i class="bi bi-facebook"></i></a></button>
              <button><a href="#"><i class="bi bi-twitter"></i></a></button>
              <button><a href="#"><i class="bi bi-instagram"></i></a></button>
          </div>
      </div>
      <div class="col-7 card-thumbnail">
          <img src="img/test.jpg" alt="">
      </div>
  </div>
  <div class="row reverse">
      <div class="col-5 card-content order-1">
          <h4>ILLUSTRATION</h4>
          <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, maxime.</h2>
          <div class="soc-icon">
              <button><a href="#"><i class="bi bi-facebook"></i></a></button>
              <button><a href="#"><i class="bi bi-twitter"></i></a></button>
              <button><a href="#"><i class="bi bi-instagram"></i></a></button>
          </div>
      </div>
      <div class="col-7 card-thumbnail order-11">
          <img src="img/test.jpg" alt="">
      </div>
  </div>
  </section>

@else
<p class="text-center fs-4"> No post found</p>
@endif

<div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div>
@endsection

{{-- @foreach ($posts->skip(1) as $post)
<article class="mt-5 border-bottom pb-4">
    <a href="/post/{{ $post->slug }}" class="text-decoration-none"><h2>{{ $post["title"] }}</h2></a>
    <p>
      By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name  }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->category_name }}</a>
    </p>
    <p>{{ $post["excerpt"] }}</p>
    <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read more....</a>
</article>    
@endforeach --}}