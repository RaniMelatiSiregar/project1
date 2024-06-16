@extends('dashboard')

@section('curdcontent')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Portofolio</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/profiles/{{ $profiles->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $profiles->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            
        </div>
        <div class="mb-3">
            <label for="biografi" class="form-label">Biografi</label>
            @error('biografi')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea id="biografi" class="form-control" name="biografi" rows="5">{{ old('body', $profiles->biografi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Insert Photo</label>
            @if($profiles->image)
                <img src="{{ asset('public/' . $profiles->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
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
        fetch('/dashboard/profiles/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
@endsection