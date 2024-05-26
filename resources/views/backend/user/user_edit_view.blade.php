@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>User List</h3>
                </div>
                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-success mb-2">{{ session('delete') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $sl => $user)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td width="50">{{ $user->address }}</td>
                                <td>
                                    @if ($user->photo == null)
                                        <img src="{{ Avatar::create($user->name)->toBase64() }}" />
                                    @else
                                        <img src="{{ asset('uploads/user') }}/{{ $user->photo }}" width="100"
                                            alt="">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></a>
                                    <a href="{{ route('user.edit.view', $user->id) }}" class="btn btn-primary"><i
                                            class="fa-solid fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="edit_table" style=" position: fixed; top: 0; left: 0; backdrop-filter: blur(3px); z-index: 9999; width:100%; height: 100vh; ">
        <div class="row">
            <div class="col-lg-6">
                <div class="card" style=" position: absolute; left: 50%; width:100%; background:#0B2A97; transform: translateY(25px);color:white; ">
                    <div class="card-header">
                        <h3>User Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $specefic_user->id) }}" method="POST">
                            @csrf
                            <div class="form-check mb-2">
                                <label class="form-label">Name</label>
                                <input value="{{$specefic_user->name}}" type="text" class="form-control" name="name"
                                    id="">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-check mb-2">
                                <label class="form-label">Email</label>
                                <input value="{{$specefic_user->email}}" type="email" class="form-control" name="email"
                                    id="">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-check mb-2">
                                <label class="form-label">Password</label>
                                <input value="{{ old('password') }}" type="password" class="form-control" name="password"
                                    id="">
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror



                           <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary w-50" type="submit">Update user</button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
