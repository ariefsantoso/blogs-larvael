@extends ('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Visi Misi</h1>
</div>


<div class="col-lg-8">
    <form method="post" action="/dashboard/visi/{{ $visis->slug }}" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $visis->title) }}" readonly>
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        

        <div class="mb-3">
          {{-- <label for="slug" class="form-label">Slug</label> --}}
          <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $visis->slug) }}">
          @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
            <p class="text-danger">{{ $message }}</p>
          @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $visis->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
          
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
  
    title.addEventListener('change', function(){
      fetch('/dashboard/visi/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });
  
    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    });

  </script>
@endsection