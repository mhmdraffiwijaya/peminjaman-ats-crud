@extends('thema')

@section('konten')

@if (auth()->user()->level == 'Admin'||
auth()->User()->level == 'Peminjam' )
<div class="d-flex justify-content-between align-items-end flex-wrap">
    <a href="/inputdatapengembalian" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i>&nbsp;Input</a>
</div>
@endif
<br>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">pengembalian </h4>
            <div class="table-responsive pt-3">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id Alat Tulis</th>
                            <th>Nama Alat Tulis</th>
                            <th>Jumlah</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pengembalian</th>
                            <th>
                                <center>Foto</center>
                            </th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $x)
                        <tr>
                            <td>{{ $x->idats }}</td>
                            <td>{{ $x->namaats }}</td>
                            <td>{{ $x->jumlah }}</td>
                            <td>{{ $x->namapengembalian }}</td>
                            <td>{{ $x->tgl }}</td>
                            <td>
                                <center>
                                    @empty($x->fotopengembalian)
                                    <span class="badge badge-danger">Tidak ada</span>
                                    @else
                                    <img src="{{ $x->fotopengembalian }}" width="100px" height="auto" alt="file">
                                </center>
                                @endempty


                            <th> @if (auth()->user()->level == 'Admin'||
                                auth()->User()->level == 'Peminjam' )
                                <center>
                                    <a type="button" href="{{ $x->fotopengembalian }}" download class="btn btn-info btn-sm"><i class="fa fa-pencil"></i>&nbsp;Download</a>
                                    @endif

                                    @if (auth()->user()->level == 'Admin'||
                                    auth()->User()->level == 'Peminjam' )
                                    <a href="/editdatapengembalian/{{$x->id}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                    <a href="/deletedatapengembalian/{{$x->id}}" onclick="return confirm('Apa anda yakin ingin menghapus data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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