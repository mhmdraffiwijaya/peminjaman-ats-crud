@extends('thema')

@section('konten')

@if (auth()->user()->level == 'Admin')
<div class="d-flex justify-content-between align-items-end flex-wrap">
    <a href="/inputdataats" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i>&nbsp;Input</a>
</div>
@endif
<br>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Alat Tulis Sekolah</h4>
            <div class="table-responsive pt-3">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id Alat Tulis</th>
                            <th>Nama Alat Tulis</th>
                            <th>Stok</th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $x)
                        <tr>
                            <td>{{$x->idats}}</td>
                            <td>{{$x->namaats}}</td>
                            <td>{{$x->stokats}}</td>
                            <th>
                                @if (auth()->user()->level == 'Admin')
                                <center>
                                    <a href="/editdataats/{{$x->id}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                    <a href="/deletedataats/{{$x->id}}" onclick="return confirm('Apa anda yakin ingin menghapus data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                </center>
                                @endif
                                @if (auth()->user()->level == 'Peminjam')
                                <center>
                                    <a class="btn btn-info btn-sm"><i class="fa fa-pencil"></i>&nbsp;Tidak Ada Action</a>
                                </center>
                                @endif
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