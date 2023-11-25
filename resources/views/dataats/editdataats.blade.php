@extends('thema_id')

@section('konten')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Alat Tulis Sekolah</h4>
            <p class="card-description">
            </p>
            <form action="/updatedataats/{{$data->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                    <label for="exampleInputUsername1">Stok</label>
                    <input class="form-control" type="text" name="stokats" value="{{$data->stokats}}" value="{{old('stokats')}}"><br>
                    @error('stokats')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
                <br>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="/viewdataats" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection