@extends('layouts.medical_record')

@section('content')
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
<style>
    tbody tr th:first-child,
    label {
        color: blue
    }

    tbody tr th:last-child {
        color: black
    }

</style>


<h2 class="container">{{ $patients->name }} {{ $patients->surname }} Medical Record</h2>
<div class="card shadow mb-4 container mt-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header" data-toggle="collapse" role="button" aria-expanded="true"
        aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Visit Record</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show f" id="collapseCardExample">
        <div class="card-body">

            <div class="card shadow mb-4 mt-3">
                <div class="d-flex flex-row-reverse pr-4 pt-2">
                    <a href="{{ route('visit-history.create', $patients->id) }}" class="btn btn-primary btn-sm">Add Information</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Doctor Speciality</th>
                                    <th>Reason of visit</th>
                                    <th>Visit Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Doctor Speciality</th>
                                    <th>Reason of visit</th>
                                    <th>Visit Date</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($patients->visitHistoryInfo as $visitHistory)
                                <tr>
                                    <td>{{  $visitHistory->docSpecInfo->doc_speciality  }}</td>
                                    <td>{{ $visitHistory->reason_of_visit }}</td>
                                    <td>{{ $visitHistory->date }}</td>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('visit-history.show', $visitHistory->id) }}"
                                                class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('visit-history.edit', $visitHistory->id) }}"
                                                class="btn btn-info btn-sm ml-2 mr-2">Edit</a>
                                            <form action="{{ route('visit-history.destroy', $visitHistory->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- TEST Information --}}
<div class="card shadow mb-4 container mt-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample2" class="d-block card-header" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Tests </h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show f" id="collapseCardExample2">
        <div class="card-body">

            <div class="card shadow mb-4 mt-3">
                <div class="d-flex flex-row-reverse pr-4 pt-2">
                    <a href="{{ route('tests.create', $patients->id) }}" class="btn btn-primary btn-sm">Add Information</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Test Name</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Test Name</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($patients->testInfo as $test)
                                <tr>
                                    <td>{{  $test->testName  }}</td>
                                    <td>{{ $test->date }}</td>
                                    <th>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('tests.show', $test->id) }}"
                                                class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('tests.edit', $test->id) }}"
                                                class="btn btn-info btn-sm ml-2 mr-2">Edit</a>
                                            <form action="{{ route('tests.destroy', $test->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- MEDICATION History --}}
<div class="card shadow mb-4 container mt-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample3" class="d-block card-header" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Medication Record</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show f" id="collapseCardExample3">
        <div class="card-body">

        <div class="card shadow mb-4 mt-3">
            <div class="d-flex flex-row-reverse pr-4 pt-2">
                <a href="{{ route('medications.create', $patients->id) }}" class="btn btn-primary btn-sm">Add Information</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Medication Name</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Medication Name</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($patients->medicationInfo as $medication)
                            <tr>
                                <td>{{  $medication->name  }}</td>
                                <td>{{ $medication->start_date }}</td>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('medications.show', $medication->id) }}"
                                            class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('medications.edit', $medication->id) }}"
                                            class="btn btn-info btn-sm ml-2 mr-2">Edit</a>
                                        <form action="{{ route('medications.destroy', $medication->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </th>
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
