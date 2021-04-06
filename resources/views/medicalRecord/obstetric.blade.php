@extends('layouts.medical_record')

@section('content')

<style>
    tbody tr th:first-child {
        color: blue
    }

    tbody tr th:last-child {
        color: black
    }

    .move-context{
        margin-bottom: 200px
    }

</style>
<h2 class="container" style="margin-left: 380px">{{ $patients->name }} {{ $patients->surname }} Medical Record</h2>
<div class="move-context">
    <div class="card shadow mb-4 container mt-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Obstetric History</h6>
        </a>
        <!-- Diseases INFORMATION -->
        <div class="collapse show f" id="collapseCardExample">
            <div class="card-body">

                <div class="card shadow mb-4 mt-3">
                    <div class="d-flex flex-row-reverse pr-4 pt-2">
                        <a href="{{ route('obstetric.create', $patients->id) }}" class="btn btn-primary btn-sm">Add
                            Obstetric</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Type of Obstetric</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Type of Obstetric</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($patients->obstetricInfo as $obstetric)
                                    <tr>
                                        <td>{{ $obstetric->doctor_name}}</td>
                                        <td>{{ $obstetric->type}}</td>
                                        <td>{{ $obstetric->date}}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('obstetric.show', $obstetric->id) }}"
                                                    class="btn btn-primary btn-sm mr-2">View</a>
                                                <form action="{{ route('obstetric.destroy', $obstetric->id) }}"
                                                    method="POST">
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
</div>
@endsection
