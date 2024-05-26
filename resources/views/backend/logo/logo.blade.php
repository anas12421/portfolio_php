@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Logo List</h3>
                </div>
                <div class="card-body">

                    @if (session('delete'))
                        <div class="alert alert-success">{{ session('delete') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($logos as $sl => $logo)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ $logo->name }} <img src="{{ asset('uploads/logo') }}/{{ $logo->photo }}"
                                        width="100" alt=""></td>
                                <td>
                                    <a class="btn btn-{{ $logo->status == 1 ? 'success' : 'light' }}" href="{{route('logo.status' , $logo->id)}}">
                                        {{ $logo->status == 1 ? 'ON' : 'OFF' }}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('logo.delete', $logo->id) }}" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Logo Insert</h3>
                </div>
                <div class="card-body">
                    <strong class="text-danger mb-3">Insert Logo Name or Image Only 1 Item at a time</strong>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('logo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class=" mt-5 mb-3">
                            <label for="" class="form-label">Logo Name</label>
                            <input type="text" name="name" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Logo Image</label>
                            <input type="file" name="photo" class="form-control" id=""
                                onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])">

                            <img src="" id="logo" width="100" alt="">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
