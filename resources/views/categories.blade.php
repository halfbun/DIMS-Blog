@extends('layouts.main')

@section('container')

<h1 class="mb-5">Categories</h1>
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/blog?category={{ $category->slug }}">
                    <div class="card bg-dark text-white">
                        <img src="https://picsum.photos/id/{{ $category->id }}/1200/800" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-3 fs-4" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->category_name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection