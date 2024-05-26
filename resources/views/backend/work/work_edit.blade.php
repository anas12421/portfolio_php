@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Work Update</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{route('work.update' , $work->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$work->title}}" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Project Link</label>
                            <input type="url" name="link" class="form-control" value="{{$work->link}}" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Project Photo</label>
                            <input type="file" name="photo" class="form-control"
                                onchange="document.getElementById('project').src = window.URL.createObjectURL(this.files[0])">
                            <img src="{{asset('uploads/work')}}/{{$work->photo}}" id="project" class="mt-2" width="150" alt="">
                        </div>

                        <div class="mb-3"><button class="btn btn-primary">Add Work</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
