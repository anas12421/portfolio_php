@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>User Info</h3>
            </div>
            <div class="card-body">
                @if (session('updated'))
                <div class="alert alert-success">{{session('updated')}}</div>
                @endif
                <form action="{{route('user.info.update')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="" value="{{Auth::user()->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="" value="{{Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control" id="" value="{{Auth::user()->phone}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="" value="{{Auth::user()->address}}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h2>User Password</h2>

            </div>
            <div class="card-body">
                @if (session('pass_update'))
                <div class="alert alert-success">{{session('pass_update')}}</div>
                @endif
                <form class="forms-sample" action="{{route('password.update')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label >Current Password</label>
                        <input type="password" class="form-control" name="current_password">
                        @error('current_password')
                            <strong class="text-danger">
                                {{$message}}
                            </strong>
                        @enderror
                        @if (session('wrong'))
                        <div class="alert alert-danger">{{session('wrong')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label >New Password</label>
                        <input type="password" class="form-control" name="password" >
                        @error('password')
                            <strong class="text-danger">
                                {{$message}}
                            </strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label >Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" >
                        @error('password_confirmation')
                            <strong class="text-danger">
                                {{$message}}
                            </strong>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label>Role</label>
                        <input type="number" class="form-control" name="role" maxlength="5" value="{{Auth::user()->role}}">
                    </div> --}}
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
            </div>
                    </div>
    </div>


    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h2>User Photo Update</h2>

            </div>
            <div class="card-body">
                @if (session('photo_updated'))
                <div class="alert alert-success">{{session('photo_updated')}}</div>
                @endif
                <form class="forms-sample" action="{{route('photo.update')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label >Photo</label>
                        <input type="file" class="form-control" name="profile_photo"  onchange="document.getElementById('profile').src = window.URL.createObjectURL(this.files[0])" >
                        <img class="d-block" id="profile" width="150" src="{{asset('uploads/user')}}/{{Auth::user()->photo}}" alt="Please Upload a Photo">
                        @error('profile_photo')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label>Role</label>
                        <input type="number" class="form-control" name="role" maxlength="5" value="{{Auth::user()->role}}">
                    </div> --}}
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
            </div>
                    </div>
    </div>
</div>
@endsection
