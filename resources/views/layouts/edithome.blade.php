@extends('dashboard')

@section('curdcontent')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Home</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/homes/{{ $home->id }}" class="mb-5" enctype="multipart/form-data"> 
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $home->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            
        </div>
        <div class="mb-3">
            <label for="about" class="form-label">About</label>
            @error('about')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea id="about" class="form-control" name="about" rows="5">{{ old('body', $home->about) }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Insert Photo</label>
            @if($home->image)
                <img src="{{ asset('public/' . $home->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>  
</div>
</div>
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/homes/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
@endsection