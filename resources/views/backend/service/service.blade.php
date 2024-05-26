@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Service's List</h3>
                </div>
                <div class="card-body">
                    @if (session('update'))
                        <div class="alert alert-success">{{ session('update') }}</div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-success">{{ session('delete') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Icon Tag</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($services as $sl => $service)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ $service->icon }}</td>
                                <td>{{ $service->title }}</td>
                                <td title="{{ $service->description }} ">{{ substr($service->description, 0, 20) }}...</td>
                                <td>
                                    <a href="{{ route('service.edit.view', $service->id) }}" class="btn btn-primary"><i
                                            class="fa-solid fa-edit"></i></a>
                                    <a href="{{ route('service.delete', $service->id) }}" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Feature Add</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('service.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Icon Tag</label>
                            <input type="text" name="icon" class="form-control" id="">
                            <p class="text-red">i class="fa-solid fa-XXXXXX"/i</p>
                            <a href="https://fontawesome.com/search" target="_blank" class="text-info">Collect Icon Tag
                                from here</a>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="4"></textarea>
                        </div>

                        <div class="mb-3"><button class="btn btn-primary">Add Srevice</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
