@extends('dashboard.layouts.main')

@section('container')
<div class="container bg-white pb-1">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
</div>
<div class="col-lg-8">
<form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title </label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
      @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
      @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" aria-label="Default select example" name="category_id" >
        @foreach ($categories as $category)
        @if (old('category_id') == $category->id)
          <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>            
          @else
          <option value="{{ $category->id }}">{{ $category->category_name }}</option>            
        @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Post Image</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="isi_post" class="form-label">Isi Post</label>
      @error('isi_post')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="isi_post" type="hidden" name="isi_post" value="{{ old('isi_post') }}">
      <trix-editor input="isi_post"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Create Post</button>
  </form>  
</div>
</div>

{{-- javascript untuk membuat slug dengan fetch API --}}
<script>
  const title=document.querySelector('#title');
  const slug=document.querySelector('#slug');

  title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

// javascript untuk mendisable attach file pada trix 
  document.addEventListener('trix-file-accept', function(e)
  {
    e.preventDefault();
  })

//javascript untuk membuat preview image attachment
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block'; //agar tampilan block bukan inline
  
  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
  
  }

</script>
@endsection