@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3>Menu List</h3>
                </div>
                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-success">{{ session('delete') }}</div>
                    @endif

                    @if (session('updated'))
                        <div class="alert alert-success">{{ session('updated') }}</div>
                    @endif
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>SL</th>
                            <th>Menu Name</th>
                            <th>Menu Link</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($menus as $sl=>$menu )

                        <tr>

                            <td>{{$sl+1}}</td>
                            <td class="text-capitalize">{{$menu->menu_name}}</td>
                            <td>{{$menu->menu_link}}</td>
                            <td>
                                <a href="{{route('menu.delete',$menu->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="{{route('menu.edit.view',$menu->id)}}" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h3>Add Menu</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('menu.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Menu Name</label>
                            <input type="text" name="menu_name" class="form-control" id="">

                            @error('menu_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Menu Link</label>
                            <input type="text" name="menu_link" class="form-control" id="">

                            @error('menu_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Menu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
