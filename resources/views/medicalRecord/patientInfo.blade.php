@extends('layouts.medical_record')

@section('content')

<style>
    tbody tr th:first-child {
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
        <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show f" id="collapseCardExample">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Name:</th>
                                <th>{{ $patients->name }}</th>
                            </tr>
                            <tr>
                                <th>Surname:</th>
                                <th>{{ $patients->surname }}</th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>{{ $patients->identity_number}}</th>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <th>{{ $patients->email }}</th>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <th>{{ $patients->status }}</th>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <th>{{ $patients->telephone }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Nationality:</th>
                                <th>{{ $patients->nationality }}</th>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <th>{{ $patients->gender }}</th>
                            </tr>
                            <tr>
                                <th>Date of Birth:</th>
                                <th>{{ $patients->dbo }}</th>
                            </tr>
                            <tr>
                                <th>Weight:</th>
                                <th>{{ $patients->weight }} kg</th>
                            </tr>
                            <tr>
                                <th>Height:</th>
                                <th>{{ $patients->height }} cm</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex flex-row-reverse pr-4 pt-2">
                <a href="{{ route('patients.edit',$patients->id) }}" class="btn btn-info btn-sm">Edit Information</a>
            </div>
        </div>
    </div>
</div>

{{-- Contact Information --}}
<div class="card shadow mb-4 container mt-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample2" class="d-block card-header" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Contact Information</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show f" id="collapseCardExample2">
        <div class="card-body">
            @if($patients->contactInfo == null)
                <div class="d-flex justify-content-center">
                    <a href="{{ route('contacts.create',$patients->id) }}" class="btn btn-primary btn-sm">Add Contact
                        Information</a>
                </div>
            @else
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Country:</th>
                                <th>{{ $patients->contactInfo->country }}</th>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <th>{{ $patients->contactInfo->address }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>City:</th>
                                <th>{{ $patients->contactInfo->city }}</th>
                            </tr>
                            <tr>
                                <th>Postal Code:</th>
                                <th>{{ $patients->contactInfo->postal_code }}</th>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex flex-row-reverse pr-4 pt-2">
                <a href="{{ route('contacts.edit',$patients->contactInfo->id) }}" class="btn btn-info btn-sm">Edit
                    Information</a>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Family History --}}
<div class="card shadow mb-4 container mt-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample3" class="d-block card-header" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Family History</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show f" id="collapseCardExample3">

        <div class="card shadow mb-4 mt-3">
            <div class="d-flex flex-row-reverse pr-4 pt-2">
                <div class="p-2 bd-highlight"><a href="{{ route('familyHistory.create', $patients->id) }}"
                        class="btn btn-primary btn-sm">Add Information</a></div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Disease Name</th>
                                <th>Family Side</th>
                                <th>Year Diagnosed</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Disease Name</th>
                                <th>Family Side</th>
                                <th>Year Diagnosed</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($patients->familyHistoryInfo as $fhInfo)
                            <tr>
                                <td>{{ $fhInfo->disease_name }}</td>
                                <td>{{ $fhInfo->family_side }}</td>
                                <td>{{ $fhInfo->diagnosed_year }}</td>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('familyHistory.show', $fhInfo->id) }}"
                                            class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('familyHistory.edit',$fhInfo->id) }}"
                                            class="btn btn-info btn-sm mr-2 ml-2">Edit</a>
                                        <form action="{{ route('familyHistory.destroy', $fhInfo->id) }}" method="POST">
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
