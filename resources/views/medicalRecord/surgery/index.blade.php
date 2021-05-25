@extends('layouts.medical_record')

@section('content')
<div class="move-context2">
    <h2 class="container">{{ $patients->name }} {{ $patients->surname }} Medical Record</h2>
    <!-- DataTales Example -->
    <div class="container">
        <div class="card shadow mb-5 mt-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Surgery Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Surgery Name</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Surgery Name</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($patients->surgeryInfo as $surgery)

                            <tr>
                                <td>{{ $surgery->name }}</td>
                                <td>{{ $surgery->datetime }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('surgeries.show', $surgery->id) }}"
                                            class="btn btn-primary btn-sm mr-2">View</a>
                                        <a href="{{ route('surgeries.edit', $surgery->id) }}"
                                            class="btn btn-info btn-sm mr-2">Edit</a>
                                        <form action="{{ route('surgeries.destroy', $surgery->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <style>
        .move-context2{
            margin-left: 150px;
            margin-bottom: 250px
        }
    </style>
@endsection
