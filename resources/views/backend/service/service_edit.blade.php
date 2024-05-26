@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Service Update</h3>
                </div>
                <div class="card-body">

                    <form action="{{ route('service.update', $service->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Icon Tag</label>
                            <input type="text" name="icon" class="form-control" id=""
                                value="{{ $service->icon }}">
                            <p class="text-red">i class="fa-solid fa-XXXXXX"/i</p>
                            <a href="https://fontawesome.com/search" target="_blank" class="text-info pt-1">Collect Icon Tag
                                from here</a>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id=""
                                value="{{ $service->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="4">{{ $service->description }}</textarea>
                        </div>

                        <div class="mb-3"><button class="btn btn-primary">Update Service</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
