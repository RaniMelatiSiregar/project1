@extends('dashboard')

@section('curdcontent')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Home</h2>
            </div>
            
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{$home->title}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>About:</strong>
                {{$home->about}}
            </div>
        </div>
    </div>

    @if ($home->image)
                <img src="{{ asset('storage/' . $home->image) }}" class="profile-img " style="width: 50%" alt="...">
            @else
                <img src="{{ asset('assets/public/assets/wanita.png') }}" class="profile-img" alt="...">
            @endif
            <article class="my-3 fs-6">
                {!! $home->about !!}
            </article>

    <div class="pull-right">
        <a class="btn btn-primary" href="/dashboard/homes/ {{$home->id}}"> Back</a>
    </div>

@endsection
