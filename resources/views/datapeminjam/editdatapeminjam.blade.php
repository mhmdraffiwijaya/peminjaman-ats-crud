@extends('thema_id')

@section('konten')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Peminjaman</h4>
            <p class="card-description">
            </p>
            <form action="/updatedatapeminjam/{{$data->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}

                <input class="form-control" type="hidden" name="id" value="{{$data->id}}" value="{{old('id')}}"><br>
                <div class="form-group">
                    <label for="exampleInputUsername1">Id Alat Tulis</label>
                    <input class="form-control" type="text" name="idats" value="{{$data->idats}}" value="{{old('idats')}}"><br>
                    @error('idats')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Alat Tulis</label>
                    <input class="form-control" type="text" name="namaats" value="{{$data->namaats}}" value="{{old('namaats')}}"><br>
                    @error('namaats')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Jumlah</label>
                    <input class="form-control" type="text" name="jumlah" value="{{$data->jumlah}}" value="{{old('jumlah')}}"><br>
                    @error('jumlah')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Peminjam</label>
                    <input class="form-control" type="text" name="namapeminjam" value="{{$data->namapeminjam}}" value="{{old('namapeminjam')}}"><br>
                    @error('namapeminjam')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Tanggal Pinjam</label>
                    <input class="form-control" type="date" name="tgl" value="{{$data->tgl}}" value="{{old('tgl')}}"><br>
                    @error('tgl')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="fotopeminjam" id="exampleInputFile" class="form-control">
                    <input type="hidden" name="pathFile" value="{{ $data->fotopeminjam }}">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="{{ $data->fotopeminjam }}">
                        <span class="input-group-append">
                        </span>
                    </div>
                    @error('fotopeminjam')
                    <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="/viewdatapeminjam"> <button class="btn btn-light">Cancel</button> </a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection