@extends('layouts.medical_record')

@section('css')
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
<style>
    tbody tr th:first-child {
        color: blue
    }

    tbody tr th:last-child {
        color: black
    }

</style>
@endsection

@section('content')

<h2 class="container">{{ $patients->name }} {{ $patients->surname }} Medical Record</h2>
<div class="card shadow mb-4 container mt-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header" data-toggle="collapse" role="button" aria-expanded="true"
        aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Diet History</h6>
    </a>
    <!-- DIET INFORMATION -->
    <div class="collapse show f mt-3 mb-3" id="collapseCardExample">
        <div class="card">
            <div class="card shadow">
                <div class="d-flex flex-row-reverse pr-4 pt-2">
                    <a href="{{ route('diets.create', $patients->id) }}" class="btn btn-primary btn-sm">Add Diet</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Diet Description</th>
                                    <th>Started Date</th>
                                    <th>End Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Diet Description</th>
                                    <th>Started Date</th>
                                    <th>End Date</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($patients->dietInformation as $dietInfo)
                                <tr>
                                    <td>{!! $dietInfo->description !!}</td>
                                    <td>{{ $dietInfo->start_date }}</td>
                                    <td>{{ $dietInfo->finish_date }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('diets.edit', $dietInfo->id) }}"
                                                class="btn btn-info btn-sm mr-2">Edit</a>
                                            <form action="{{ route('diets.destroy', $dietInfo->id) }}" method="POST">
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
</div>


{{-- HABITS INFORMATION --}}
<div class="card shadow mb-4 container mt-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample2" class="d-block card-header" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample2">
        <h6 class="m-0 font-weight-bold text-primary">Habits</h6>
    </a>
    <!-- habits table -->
    <div class="collapse show f" id="collapseCardExample2">
        <div class="card-body">
            <div class="card shadow mb-4 mt-3">
                <div class="d-flex flex-row-reverse pr-4 pt-2">
                    <a href="{{ route('habits.create', $patients->id) }}" class="btn btn-primary btn-sm">Add Habits</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Habit Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Habit Name</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($patients->habitsInfo as $habitsInfo)
                                <tr>
                                    <th>{!! $habitsInfo->name !!}</th>
                                    <th style="width: 10%">
                                        <div class="text-center">
                                            <form action="{{ route('habits.destroy', $habitsInfo->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm d-flex flex-row-reverse">Delete
                                                    Habit</button>
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

{{-- Immunization INFORMATION --}}
<div class="card shadow mb-4 container mt-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample3" class="d-block card-header" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample3">
        <h6 class="m-0 font-weight-bold text-primary">Immunizations</h6>
    </a>
    <!-- Immunization table -->
    <div class="collapse show f" id="collapseCardExample3">
        <div class="card shadow mb-4 mt-3">
            <div class="d-flex flex-row-reverse pr-4 pt-2">
                    <a href="{{ route('immunizations.create', $patients->id) }}" class="btn btn-primary btn-sm">Add Information</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Vaccine Name</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Vaccine Name</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($patients->immunizationInfo as $immunizationInfo)
                                <tr>
                                    <td>{{  $immunizationInfo->vaccine_name  }}</td>
                                    <td>{{ $immunizationInfo->date }}</td>
                                    <td>{!! $immunizationInfo->description !!}</td>
                                    <th style="width: 10%">
                                        <form action="{{ route('immunizations.destroy', $immunizationInfo->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete Immunization</button>
                                        </form>
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
