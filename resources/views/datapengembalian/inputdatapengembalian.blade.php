@extends('thema')

@section('konten')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Input Data Pengembalian</h4>
            <p class="card-description">
            </p>
            <form action="/savedatapengembalian" method="POST" class="form-horizontal" files="true" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputUsername1">Id Alat Tulis</label>
                    <input type="text" name="idats" class="form-control" placeholder="idats" value="{{old('idats')}}">
                    @error('idats')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Alat Tulis</label>
                    <input type="text" name="namaats" class="form-control" placeholder="namaats" value="{{old('namaats')}}">
                    @error('namaats')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" placeholder="jumlah" value="{{old('jumlah')}}">
                    @error('jumlah')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Peminjam</label>
                    <input type="text" name="namapengembalian" class="form-control" placeholder="namapengembalian" value="{{old('namapengembalian')}}">
                    @error('namapengembalian')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Tanggal Pengembalian</label>
                    <input type="date" name="tgl" class="form-control" placeholder="tgl" value="{{old('tgl')}}">
                    @error('tgl')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="fotopengembalian" id="exampleInputFile" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="/viewdatapengembalian" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection