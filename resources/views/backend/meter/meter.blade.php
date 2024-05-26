@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Meter Recharge Info</h3>
                </div>
                <div class="card-body">
                    <table id="meter" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Meter No</th>
                                <th>Recahrge</th>
                                <th>Date</th>
                                {{-- <th>Ago</th> --}}
                                <th>Cash In Hand</th>
                                <th>Comment</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sub = 0;
                            @endphp
                            @foreach ($meters as $sl => $meter)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $meter->meter_no }}</td>
                                    <td>{{ $meter->recharge }}</td>
                                    <td>{{ $meter->date }}</td>
                                    {{-- <td>{{ $meter->created_at->diffForHumans() }}</td> --}}
                                    <td>{{ $meter->cash - $meter->recharge }}</td>
                                    <td>{{ $meter->comment }}</td>
                                </tr>

                                @php
                                    $sub += $meter->recharge;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Meter No</th>
                                <th>Recahrge</th>
                                <th>Date</th>
                                {{-- <th>Ago</th> --}}
                                <th>Cash In Hand</th>
                                <th>Comment</th>

                            </tr>
                        </tfoot>
                    </table>
                    <h4 class="alert alert-info text-center">Cash Recharge From 18/02/2024 to Now &#2547; {{ $sub }}</h4>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Recharge Meter</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('meter.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Meter Number</label>
                            <select name="meter_no" class="form-control" id="">
                                <option value="">Select Meter Number</option>
                                <option value="40610078017-Sobuj">40610078017-Sobuj</option>
                                <option value="40610078018-Sumon">40610078018-Sumon</option>
                                <option value="40610078019-Anas_AC">40610078019-Anas_Ac</option>
                                <option value="40610078020-Nuha">40610078020-Nuha</option>
                                <option value="40610078021-Ips">40610078021-Ips</option>
                                <option value="40610078022-Amma">40610078022-Amma</option>
                                <option value="40610078023-Abu_Rayhan">40610078023-Abu_Rayhan</option>
                                <option value="40610078024-Rumpa">40610078024-Rumpa</option>
                                <option value="40610078025-Motor">40610078025-Motor</option>
                                <option value="40610078026-Tulon">40610078026-Tulon</option>
                                <option value="40610078027-Angura">40610078027-Angura</option>
                                <option value="40610078028-Anas">40610078028-Anas</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Recharge Amount</label>
                            <input type="number" name="recharge" class="form-control" id="">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" id="">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Cash</label>
                            <input type="number" name="cash" class="form-control" id=""
                                value="{{ $latest_meter->cash - $latest_meter->recharge }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Comment</label>
                            <input type="text" name="comment" class="form-control" id="">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-50">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        // let table = new DataTable('#meter');

        new DataTable('#meter', {
            layout: {
                topStart: {
                    buttons: ['copy', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>
@endsection
