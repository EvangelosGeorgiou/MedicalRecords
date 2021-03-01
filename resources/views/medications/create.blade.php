@extends('layouts.medical_record')

@section('content')

<div class="card-body">
    <div class="card-header">
        {{ isset($medication) ? 'Edit Patient Medication' : 'Add Patient Medication' }}
    </div>

    <div class="card-body">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ isset($medication) ? route('medications.update', $medication->id) : route('medications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($medication))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="name">Medication Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter patient name" value="{{ isset($medication) ? $medication->name : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="start_date">Medication Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="start_date" value="{{ isset($medication) ? $medication->start_date : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="finish_date">Medication Finish Date</label>
                        <input type="date" class="form-control" name="finish_date" id="finish_date" value="{{ isset($medication) ? $medication->finish_date : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="instuctions">Instructions</label>
                        <textarea type="text" name="instuctions" id="instuctions" class="form-control" rows="5">{{ isset($medication) ? $medication->instuctions : ''  }}</textarea>
                    </div>

                    <button class="btn btn-success" type="submit">{{isset($medication) ? 'Update Patient Medication ' : 'Add Patient Medication'}}</button>
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="doctor_name">Doctor Name</label>
                        <input type="text" class="form-control" name="doctor_name" id="doctor_name"
                            placeholder="Enter doctor name who gave the medication" value="{{ isset($medication) ? $medication->doctor_name : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="dosage">Dosage</label>
                        <input type="text" class="form-control" name="dosage" id="dosage" placeholder="Enter medication dosage" value="{{ isset($medication) ? $medication->dosage : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="purpose">Purpose of the medication</label>
                        <input type="text" class="form-control" name="purpose" id="purpose"
                            placeholder="Enter purpose of the medication" value="{{ isset($medication) ? $medication->purpose : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="side_effects">Side Effects</label>
                        <textarea type="text" name="side_effects" id="side_effects" class="form-control" rows="5">{{ isset($medication) ? $medication->side_effects : ''  }}</textarea>
                    </div>

                    <input type="hidden" id="patient_id" name="patient_id" value="{{$patients->id}}">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
          flatpickr('#start_date')
          flatpickr('#finish_date')
    </script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
@endsection
