@extends('dashboard')

@section('curdcontent')
    <!-- <form class="mx-auto px-4 mt-4">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">About Me</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form> -->
                <!-- <main>
                    <div class="container-fluid px-4 mt-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main> -->

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