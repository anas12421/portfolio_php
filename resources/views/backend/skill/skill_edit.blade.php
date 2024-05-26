@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Skill Update</h3>
                </div>
                <div class="card-body">

                    <form action="{{ route('skill.update', $skill->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Skill Name</label>
                            <input type="text" name="name" class="form-control" id=""
                                value="{{ $skill->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Percentage</label>
                            <input type="number" min="0" max="100" name="percentage" class="form-control"
                                id="" value="{{ $skill->percentage }}">
                        </div>
                        <div class="mb-3"><button class="btn btn-primary">Update Skill</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
