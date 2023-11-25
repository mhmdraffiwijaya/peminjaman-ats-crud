@extends('thema')

@section('konten')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Input Data Peminjaman</h4>
            <p class="card-description">
            </p>
            <form action="/savedatapeminjam" method="POST" class="form-horizontal" files="true" enctype="multipart/form-data">
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
                    <input type="text" name="namapeminjam" class="form-control" placeholder="namapeminjam" value="{{old('namapeminjam')}}">
                    @error('namapeminjam')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Tanggal Pinjam</label>
                    <input type="date" name="tgl" class="form-control" placeholder="tgl" value="{{old('tgl')}}">
                    @error('tgl')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="fotopeminjam" id="exampleInputFile" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="/viewdatapeminjam" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection