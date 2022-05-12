@extends('layouts.main')

@section('container')

<section id="bloglist">
  <div class="full-head">
    <div class="col text-center"><h1 class="fw-bold"><span class="a-font">B</span>LOG<span class="s-font">.</span></h1></div>
</div>
<div class="container">

@if ($posts->count())

{{-- bloglist --}}
  <div class="row">
    @foreach ($posts as $post)

    <div class="col-md-4 mb-3">   
      <div class="card">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->category_name }}">                   
            <div class="speech-bubble">
              <div class="row">
                <div class="col date-blog1"><h1>{{ $post->created_at->format('d') }}</h1></div>
                <div class="col date-blog2">
                  <div class="row date-blogA">{{ $post->created_at->format('F') }}</div>
                  <div class="row date-blogB">{{ $post->created_at->format('Y') }}</div>
                </div>
              </div>
            </div>
            <div class="card-body" style="height: 250px;">
              <div class="text-center my-2 card-cat"><a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->category_name }}</a></div>
              <h4 class="card-title fw-bold" style="height: 2.3em; overflow:hidden">{{ $post->title }}</h4>
              <div style="height: 4.5em; overflow:hidden">
              <p class="card-text">{{ $post["excerpt"] }}</p>
            </div>
            <div class="mt-3 read-btn">
            <a class="text-decoration-none" href="/post/{{ $post->slug }}" ><i class="bi bi-arrow-right"></i> READ MORE</a>
          </div>
          </div>
      </div>
    </div>
    @endforeach
  </div>

  

{{-- end blogpost --}}


@else
<p class="text-center fs-4"> No post found</p>
@endif

<div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div>
</div>
</section>
@endsection

