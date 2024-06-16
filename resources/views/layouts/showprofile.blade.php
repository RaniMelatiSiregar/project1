@extends('dashboard')

@section('curdcontent')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Portofolio</h2>
            </div>
            
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{$profiles->title}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biografi:</strong>
                {{$profiles->biografi}}
            </div>
        </div>
    </div>

    @if ($profile->image)
    <div style="max-height: 350px; overflow:hidden;">
        <img src="{{ asset('storage/' . $profile->image) }}" class="img-fluid rounded-start my-3" alt="...">
    </div>
@else
    <img src="https://source.unsplash.com/1200x500?{{ $profile->category->name }}" class="img-fluid rounded-start my-3" alt="...">
@endif
<article class="my-3 fs-6">
    {!! $profile->biografi !!}
</article>

    <div class="pull-right">
        <a class="btn btn-primary" href="/dashboard/profiles/ {{$profiles->id}}"> Back</a>
    </div>

@endsection
