@extends('thema_id')

@section('konten')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data User</h4>
            <p class="card-description">
            </p>
            <form action="/updateuser/{{$data->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <input class="form-control" type="hidden" name="id" value="{{$data->id}}" value="{{old('id')}}"><br>
                <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input class="form-control" type="text" name="name" value="{{$data->name}}" value="{{old('name')}}"><br>
                    @error('name')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input class="form-control" type="email" name="email" value="{{$data->email}}" value="{{old('email')}}"><br>
                    @error('email')
                    {{ $message }}
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