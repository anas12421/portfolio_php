@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Works's List</h3>
                </div>
                <div class="card-body">
                    @if (session('update'))
                        <div class="alert alert-success">{{ session('update') }}</div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-success">{{ session('delete') }}</div>
                    @endif
                    <table class="table table-bordered display" id="work">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($works as $sl => $work)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $work->title }}</td>
                                    <td>
                                        <a href="{{ $work->link }}" target="_blank">{{ $work->link }}</a>
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/work') }}/{{ $work->photo }}" width="100"
                                            alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('work.edit.view', $work->id) }}" class="btn btn-primary"><i
                                                class="fa-solid fa-edit"></i></a>
                                        <a href="{{ route('work.delete', $work->id) }}" class="btn btn-danger"><i
                                                class="fa-solid fa-trash"></i></a>
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
                    <h3>Work Add</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('work.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Project Link</label>
                            <input type="url" name="link" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Project Photo</label>
                            <input type="file" name="photo" class="form-control"
                                onchange="document.getElementById('project').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" id="project" width="150" alt="">
                        </div>

                        <div class="mb-3"><button class="btn btn-primary">Add Work</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        let table = new DataTable('#work');
    </script>
@endsection
