@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Contact Card Update</h3>
                </div>
                <div class="card-body">
                    @if (session('update'))
                        <div class="alert alert-success">{{ session('update') }}</div>
                    @endif
                    <form action="{{ route('contact.card.update', $card->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">Name</label>
                            <input type="text" name="name" id="" class="form-control"
                                value="{{ $card->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">title</label>
                            <input type="text" name="title" id="" class="form-control"
                                value="{{ $card->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">decription</label>
                            <textarea name="description" id="" cols="30" class="form-control" rows="4">{{ $card->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">number</label>
                            <input type="number" name="number" id="" class="form-control"
                                value="{{ $card->number }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">email</label>
                            <input type="email" name="email" id="" class="form-control"
                                value="{{ $card->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">Facebook Link</label>
                            <input type="url" name="fb" id="" class="form-control"
                                value="{{ $card->fb }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">Twitter/X Link</label>
                            <input type="url" name="tw" id="" class="form-control"
                                value="{{ $card->tw }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">Instagram Link</label>
                            <input type="url" name="in" id="" class="form-control"
                                value="{{ $card->in }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">Pinterest Link</label>
                            <input type="url" name="pi" id="" class="form-control"
                                value="{{ $card->pi }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">LinkedIn Link</label>
                            <input type="url" name="li" id="" class="form-control"
                                value="{{ $card->li }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-uppercase">Photo</label>
                            <input type="file" name="photo" id="" class="form-control mb-2"
                                onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])">

                            <img src="{{ asset('uploads/contact_card') }}/{{ $card->photo }}" id="photo"
                                width="150" alt="">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-50">Update Contact Card</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
