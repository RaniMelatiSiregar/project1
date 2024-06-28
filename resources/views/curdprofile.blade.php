@extends('dashboard')

@section('curdcontent')

     <!-- DataTales Example -->
    <div class="card shadow mb-4" style="margin: 10px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Portopolio Example</h6>
    </div>
        <div class="card-body">
            <a href="/dashboard/profiles/create" class="btn btn-primary mb-3">Create New Portopolio</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Biografi</th>
                        <th scope="col" style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profiles)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $profiles->title }}</td>
                        <td>{{ $profiles->biografi }}</td>
                        <td>
                            
                            <form action="/dashboard/profiles/{{$profiles->id}}" method="POST">
   
                                <a class="btn btn-info" style="padding: 3px 6px; font-size: 10px;" href="/dashboard/profiles/{{$profiles->id}}/show">Read</a>
                
                                <a class="btn btn-primary" style="padding: 3px 6px; font-size: 10px;" href="/dashboard/profiles/{{$profiles->id}}/edit">Edit</a>
                                
                                @csrf
                                @method('DELETE')
                  
                                <button type="submit" class="btn btn-danger" style="padding: 3px 6px; font-size: 10px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

@endsection