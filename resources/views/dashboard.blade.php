@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3>Welcome to the Dashboard <strong class="text-danger">{{Auth::user()->name}}</strong></h3>
    </div>
</div>
@endsection
