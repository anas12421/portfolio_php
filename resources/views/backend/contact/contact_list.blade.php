@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Contact's List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered display" id="contact">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $sl => $contact)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->number }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td title="{{ $contact->subject }}">{{ $contact->subject }}</td>
                                    <td title="{{ $contact->message }}">{{ $contact->message }}</td>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_script')
    <script>
        let table = new DataTable('#contact');
    </script>
@endsection
