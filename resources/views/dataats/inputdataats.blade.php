@extends('thema')

@section('konten')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Input Data Alat Tulis Sekolah</h4>
            <p class="card-description">
            </p>
            <form action="/savedataats" method="POST" class="form-horizontal" files="true" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputUsername1">Id Alat Tulis</label>
                    <input type="text" name="idats" class="form-control" placeholder="id" value="{{old('id')}}">
                    @error('idats')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Alat Tulis</label>
                    <input type="text" name="namaats" class="form-control" placeholder="nama pelajaran" value="{{old('namaats')}}">
                    @error('namaats')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Stok</label>
                    <input type="text" name="stokats" class="form-control" placeholder="nama pelajaran" value="{{old('stokats')}}">
                    @error('stokats')
                    {{$message}}
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