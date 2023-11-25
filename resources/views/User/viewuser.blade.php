@extends('thema')

@section('konten')

@if (auth()->user()->level == 'Admin')
<div class="d-flex justify-content-between align-items-end flex-wrap">
    <a href="/inputuser" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i>&nbsp;Input</a>
</div>
@endif
<br>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data User</h4>
            <div class="table-responsive pt-3">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>
                                <center>Status</center>
                            </th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $x)
                        <tr>
                            <td>{{$x->name}}</td>
                            <td>{{$x->email}}</td>
                            <td>
                                <center>{{$x->level}}</center>
                            </td>
                            <th>
                                <center>
                                    <a href="/edituser/{{$x->id}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                    <a href="/deleteuser/{{$x->id}}" onclick="return confirm('Apa anda yakin ingin menghapus data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                </center>
                            </th>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection