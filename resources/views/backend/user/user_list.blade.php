@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>User List</h3>
                </div>
                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-success mb-2">{{ session('delete') }}</div>
                    @endif
                    @if (session('update'))
                        <div class="alert alert-success">{{ session('update') }}</div>
                    @endif
                    {{-- <table class="table table-bordered">
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

                    </table> --}}


                    <table class="table table-bordered display" id="myTable" >
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $sl => $user)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td title="{{$user->address}}" >{{substr($user->address, 0, 10)}}...</td>
                                <td>

                                    @if ($user->photo == null)
                                        <img style="border-radius: 50%" width="50"  height="50" src="{{ Avatar::create($user->name)->toBase64() }}" />
                                    @else
                                        <img style="border-radius: 50%" height="50"  src="{{ asset('uploads/user') }}/{{ $user->photo }}" width="50"
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
                        </tbody>
                    </table>






                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add New User</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('user.add') }}" method="POST">
                        @csrf
                        <div class="form-check mb-2">
                            <label class="form-label">Name</label>
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                id="">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-check mb-2">
                            <label class="form-label">Email</label>
                            <input value="{{ old('email') }}" type="email" class="form-control" name="email"
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
                        <div class="form-check mb-2">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="">
                        </div>
                        @if (session('match'))
                            <div class="alert alert-danger">{{ session('match') }}</div>
                        @endif
                        @error('confirm_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <button class="btn btn-primary" type="submit">Add new user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')

<script>
    let table = new DataTable('#myTable');
</script>
@endsection
