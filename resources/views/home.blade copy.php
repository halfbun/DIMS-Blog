@extends('layouts.main')

@section('container')

<section id="home">
  <div class="container-fluid">
  <div class="row">
      <div class="col-4">
          <div class="thumbnail-home ">
              <img src="img/home-bg.png" alt="">
          </div>
      </div>
      <div class="mt-5 col-8 d-flex align-items-center flex-column">
          <h1 class="floating"><span class="white-f">D</span>ims<span class="outline">.</span></h1>
          <div class="home-content">
              <h4>Welcome to my blog, I'm Dimas</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet enim repellat obcaecati ad blanditiis magnam architecto soluta cupiditate dolorum nulla.</p>
          </div>
      </div>
  </div>
  </div>
  </section>

<section id="blogpost">
  @foreach ($posts as $post)
  @if($loop->iteration % 2 == 1)      
  <div class="row dark main-card">
  @else
  <div class="row reverse flex-row-reverse main-card">
  @endif
      <div class="col-4 card-content">
          <h4>{{ $post->category->category_name }}</h4>
          <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none"><h2>{{ $post->title }}</h2></a>
          <div class="author-content">
          <div class="soc-icon">
              <button><a href="#"><i class="bi bi-facebook"></i></a></button>
              <button><a href="#"><i class="bi bi-twitter"></i></a></button>
              <button><a href="#"><i class="bi bi-instagram"></i></a></button>
          </div>
          <h5 class="author"> 
            <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name  }}</a> |
            {{ $posts[0]->created_at->diffForHumans() }}
          </h5>
        </div>
      </div>
      <div class="col-8 card-thumbnail">
        <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none"><img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->category_name }}"></a>
      </div>
  </div>
@endforeach

<div class="d-flex justify-content-center bg-white">
  {{ $posts->links() }}
</div>
</section>



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



