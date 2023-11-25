@extends('thema')

@section('konten')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Input Data User</h4>
            <p class="card-description">
            </p>
            <form action="/saveuser" method="POST" class="form-horizontal" files="true" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{old('name')}}">
                    @error('name')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="email" value="{{old('email')}}">
                    @error('email')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" value="{{old('password')}}">
                    @error('password')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">Akses</label>
                    <select name="level" class="form-control @error('level') is-invalid @enderror" id="exampleSelectGender" value="{{ old('level') }}">
                        <option value="Pilih">Pilih</option>
                        <option value="Admin">Admin</option>
                        <option value="Peminjam">Peminjam</option>
                    </select>
                    @error('level')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="/viewuser" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection