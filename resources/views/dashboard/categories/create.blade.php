@extends('dashboard.layouts.main')

@section('container')
<div class="container bg-white pb-1">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post Category</h1>
</div>
<div class="col-lg-8">
<form method="post" action="/dashboard/categories" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="category_name" class="form-label">Category Name </label>
      <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" required autofocus value="{{ old('category_name') }}">
      @error('category_name')
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
    <button type="submit" class="btn btn-primary">Create Category</button>
  </form>  
</div>
</div>

{{-- javascript untuk membuat slug dengan fetch API --}}
<script>
  const category_name = document.querySelector('#category_name');
  const slug = document.querySelector('#slug');

  category_name.addEventListener('change', function(){
    fetch('/dashboard/categories/categorySlug?category_name=' + category_name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  })

</script>
@endsection