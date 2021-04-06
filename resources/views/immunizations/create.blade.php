@extends('layouts.medical_record')

@section('content')
<div class="move-context">
    <div class="card container">
        <div class="card-header container">
            Add Immunization
        </div>

        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger container">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('immunizations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="container">

                    <div class="form-group">
                        <label for="vaccine_name">Vaccine Name</label>
                        <input type="text" id="vaccine_name" name="vaccine_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="hidden" name="description" id="description"
                            value="{{ isset($diets) ? $diets->description : '' }}">
                        <trix-editor input="description"></trix-editor>
                    </div>

                    <div class="form-group">
                        <label for="date">Date </label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>

                    <input type="hidden" name="patient_id" name="patient_id" value="{{ $patients->id }}">

                    <button class="btn btn-success" type="submit">Add Information</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#date')

</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <style>
        .move-context{
            margin-bottom: 200px
        }
    </style>
@endsection
