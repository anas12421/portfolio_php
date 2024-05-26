@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Menu Edit</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('menu.edit', $menu->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Menu Name</label>
                            <input type="text" name="menu_name" class="form-control" id=""
                                value="{{ $menu->menu_name }}">

                            @error('menu_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Menu Link</label>
                            <input type="text" name="menu_link" class="form-control" id=""
                                value="{{ $menu->menu_link }}">

                            @error('menu_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Menu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
