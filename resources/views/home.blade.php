@extends('layouts.main')

@section('container')

<section id="home">
  <div class="container-fluid">
  <div class="row">
      <div class="col-lg-4 col-12">
          <div class="thumbnail-home ">
              <img src="img/home-bg.png" alt="">
          </div>
      </div>
      <div class="mt-5 col-12 col-lg-8 d-flex align-items-center flex-column">
          <h1 class="floating"><span class="a-font">D</span>ims<span class="s-font">.</span></h1>
          <div class="home-content"> 
              <h4>Welcome to my blog, I'm Dimas</h4>
              <p>This blog is sample project that i've created using bootstrap and laravel framework.
                For now you can view article list and content from home / blog menu. I'm still working to finished the administrator side and add many feature such as user dashboard so another verified user can also contribute some entry post to this project. Thank You :)
              </p>
          </div>
      </div>
  </div>
  </div>
  </section>

<section id="blogpost" class="pt-5">
  @foreach ($posts as $post)
  @if($loop->iteration % 2 == 0)      
  <div class="row m-color text-white main-card mx-4">
  @else
  <div class="row reverse flex-row-reverse main-card mx-4">
  @endif
      <div class="col-lg-6 col-sm-12 card-content content-post">
        <h4 class="text-uppercase">{{ $post->category->category_name }}</h4>
        <a href="/post/{{ $post->slug }}" class="text-decoration-none"><h2>{{ $post->title }}</h2></a>
        <div class="author-content">
        <div class="soc-icon">
          <a href="#"><button><i class="bi bi-facebook"></i></button></a>
            <a href="#"><button><i class="bi bi-twitter"></i></button></a>
            <a href="#"><button><i class="bi bi-instagram"></i></button></a>
        </div>
        <h5 class="author"> 
          <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name  }}</a> |
          {{ $post->created_at->diffForHumans() }}
        </h5>
      </div>      
      
      </div>
      <div class="col-lg-6 col-sm-12 p-0 image-post">
        <a href="/post/{{ $post->slug }}" class="text-decoration-none"><img src="{{ asset('storage/' . $post->image) }}" class="card-img-top2" alt="{{ $post->category->category_name }}"></a>
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



