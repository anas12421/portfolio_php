@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Update Banner Info</h3>
                </div>
                <div class="card-body">
                    @if (session('updated'))
                        <div class="alert alert-success">{{session('updated')}}</div>
                    @endif
                    <form action="{{route('banner.update' , $banner->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Sub Title</label>
                            <input type="text" name="subtitle" id="" class="form-control" value="{{$banner->subtitle}}" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" value="{{$banner->title}}" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" value="{{$banner->name}}" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="4">{{$banner->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sub Title</label>
                            <input type="file" class="form-control" name="photo"  onchange="document.getElementById('banner').src = window.URL.createObjectURL(this.files[0])" >
                        <img class="d-block" id="banner" width="100" src="{{asset('uploads/banner')}}/{{$banner->photo}}" alt="Please Upload a Photo">
                        </div>


                        <div class="mb-3 d-flex justify-content-center">
                           <button type="submit" class="btn btn-primary w-50">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



