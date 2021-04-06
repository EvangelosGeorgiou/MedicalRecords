@extends('layouts.medical_record')

@section('content')
<h2 class="container" style="margin-left: 380px">{{ $patients->name }} {{ $patients->surname }} Medical Record</h2>
<div class="move-context">
    <div class="card shadow mb-4 container mt-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Diseases History</h6>
        </a>
        <!-- Diseases INFORMATION -->
        <div class="collapse show f" id="collapseCardExample">
            <div class="card-body">
                <div class="card shadow mb-4 mt-3">
                    <div class="d-flex flex-row-reverse pr-4 pt-2">
                        <a href="{{ route('diseases.create', $patients->id) }}" class="btn btn-primary btn-sm">Add
                            Information</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ICD Code</th>
                                        <th>Disease Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ICD Code</th>
                                        <th>Disease Name</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($patients->diseasesInfo as $diseases)
                                    <tr>
                                        <td>{{ $diseases->icdCodeInfo['icd_code'] }}</td>
                                        <td>{{ $diseases->icdCodeInfo['name'] }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('diseases.show', $diseases->id) }}"
                                                    class="btn btn-primary btn-sm mr-2">View</a>
                                                <a href="{{ route('diseases.edit', $diseases->id) }}"
                                                    class="btn btn-info btn-sm ml-2 mr-2">Edit</a>
                                                <form action="{{ route('diseases.destroy', $diseases->id) }}"
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

    {{-- Allergies --}}
    <div class="card shadow mb-4 container mt-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample1" class="d-block card-header" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample1">
            <h6 class="m-0 font-weight-bold text-primary">Allergies History</h6>
        </a>
        <!-- Allergies INFORMATION -->
        <div class="collapse show f" id="collapseCardExample1">
            <div class="card-body">

                <div class="card shadow mb-4 mt-3">
                    <div class="d-flex flex-row-reverse pr-4 pt-2">
                        <a href="{{ route('allergies.create', $patients->id) }}" class="btn btn-primary btn-sm">Add
                            Allergy</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Allergy Name</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Allergy Name</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($patients->allergiesInfo as $allergy)
                                    <tr>
                                        <td>{{ $allergy->name }}</td>
                                        <td>{!! $allergy->description !!}</td>
                                        <td>{{ $allergy->date }}</td>
                                        <th>
                                            <div class="d-flex justify-content-center">
                                                <form action="{{ route('allergies.destroy', $allergy->id) }}"
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

    {{-- Disorders --}}
    <div class="card shadow mb-4 container mt-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample2" class="d-block card-header" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample2">
            <h6 class="m-0 font-weight-bold text-primary">Disorder History</h6>
        </a>
        <!-- Allergies INFORMATION -->
        <div class="collapse show f" id="collapseCardExample2">
            <div class="card-body">

                <div class="card shadow mb-4 mt-3">
                    <div class="d-flex flex-row-reverse pr-4 pt-2">
                        <a href="{{ route('disorders.create', $patients->id) }}" class="btn btn-primary btn-sm">Add
                            Disorder</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ICD Code</th>
                                        <th>Disorder Name</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ICD Code</th>
                                        <th>Disorder Name</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($patients->disordersInfo as $disorder)
                                    <tr>
                                        <td>{{ $disorder->icdCodeInfo['icd_code'] }}</td>
                                        <td>{{ $disorder->icdCodeInfo['name'] }}</td>
                                        <th style="width: 15%">{{ $disorder->date }}</th>
                                        <th>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('disorders.show', $disorder->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('disorders.edit', $disorder->id) }}"
                                                    class="btn btn-info btn-sm ml-2 mr-2">Edit</a>
                                                <form action="{{ route('disorders.destroy', $disorder->id) }}"
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
</div>
@endsection
