@extends('dashboard')

@section('curdcontent')

     <!-- DataTales Example -->
    <div class="card shadow mb-4" style="margin: 10px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">nomorhp</th>
                        <th scope="col" style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contacts)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contacts->nama }}</td>
                        <td>{{ $contacts->email }}</td>
                        <td>{{ $contacts->nomor_hp }}</td>
                        <td>
                            <form action="/dashboard/profiles/{{$contacts->id}}" method="POST">
   
                                <a class="btn btn-info" style="padding: 3px 6px; font-size: 10px;" href="/dashboard/contacts/{{$contacts->id}}">Read</a>
                
                                <a class="btn btn-primary" style="padding: 3px 6px; font-size: 10px;" href="/dashboard/contacts/{{$contacts->id}}/edit">Edit</a>
                                
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