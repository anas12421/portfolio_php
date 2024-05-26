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
                            <th>Name</th>
                            <th>Percentage</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($skills as $sl => $skill)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ $skill->name }}</td>
                                <td>{{ $skill->percentage }}</td>

                                <td>
                                    <a href="{{ route('skill.edit.view', $skill->id) }}" class="btn btn-primary"><i
                                            class="fa-solid fa-edit"></i></a>
                                    <a href="{{ route('skill.delete', $skill->id) }}" class="btn btn-danger"><i
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
                    <h3>Skill Add</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('skill.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Skill Name</label>
                            <input type="text" name="name" class="form-control" id="">

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Percentage</label>
                            <input type="number" min="0" max="100" name="percentage" class="form-control" id="">
                        </div>


                        <div class="mb-3"><button class="btn btn-primary">Add Skill</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
