@extends('layouts.medical_record')

@section('content')

{{-- get the info in the for disease or disorder $disease->icdCodeInfo->name --}}

<div class="move-context pt-4">

    <div class="card container">
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

            <form
                action="{{ isset($medication) ? route('medications.update', $medication->id) : route('medications.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @if(isset($medication))
                @method('PUT')
                @endif



                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="name">Medication Name</label>
                            <select name="name" id="name" class="form-control">
                                <option value="">Please select a medicine</option>
                                @foreach ($medicines as $medicine)
                                <option value="{{ $medicine->name }}" @if(isset($medication) && $medicine->name== $medication->name ) selected @endif>{{ $medicine->name }}</option>
                                @endforeach


                            </select>
                            {{-- <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter patient name"
                                value="{{ isset($medication) ? $medication->name : old('name') }}"> --}}
                        </div>

                        <div class="form-group">
                            <label for="start_date">Medication Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date"
                                value="{{ isset($medication) ? $medication->start_date : old('start_date') }}">
                        </div>

                        <div class="form-group">
                            <label for="finish_date">Medication Finish Date</label>
                            <input type="date" class="form-control" name="finish_date" id="finish_date"
                                value="{{ isset($medication) ? $medication->finish_date : old('finish_date') }}">
                        </div>

                        <div class="form-group">
                            <label for="instuctions">Instructions</label>
                            <textarea type="text" name="instuctions" id="instuctions" class="form-control"
                                rows="5">{{ isset($medication) ? $medication->instuctions : old('instructions')  }}</textarea>
                        </div>

                        <button class="btn btn-success"
                            type="submit">{{isset($medication) ? 'Update Patient Medication ' : 'Add Patient Medication'}}</button>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="doctor_name">Doctor Name</label>
                            <input type="text" class="form-control" name="doctor_name" id="doctor_name"
                                placeholder="Enter doctor name who gave the medication"
                                value="{{ isset($medication) ? $medication->doctor_name : old('doctor_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="dosage">Dosage</label>
                            <input type="text" class="form-control" name="dosage" id="dosage"
                                placeholder="Enter medication dosage"
                                value="{{ isset($medication) ? $medication->dosage : old('dosage') }}">
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose of the medication</label>
                            <input type="text" class="form-control" name="purpose" id="purpose"
                                placeholder="Enter purpose of the medication"
                                value="{{ isset($medication) ? $medication->purpose : old('purpose') }}">
                        </div>

                        <div class="form-group">
                            <label for="side_effects">Side Effects</label>
                            <textarea type="text" name="side_effects" id="side_effects" class="form-control"
                                rows="5">{{ isset($medication) ? $medication->side_effects : old('side_effects')  }}</textarea>
                        </div>

                        <input type="hidden" id="patient_id" name="patient_id" value="{{$patients->id}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL --}}

@if(!empty($error_code) && $error_code == 5)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLongTitle" style="color: #87CEEB"><i
                        class="fas fa-exclamation-triangle" style="color: yellow"></i> <b>Warning</b>
                </h5>
                <button style="color: #87CEEB" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-dark" style="color: white">
                The patient {{ $patients->name." ".$patients->surname }} has the following problem: <br>
                <ul>
                    @foreach ($diseases as $disease)
                    <li>{{ $disease }}</li>
                    @endforeach

                </ul>
                Giving this medicine to the patient will cause side effects. <br><br>
                Do you wish to continue?
            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" id="confirm-store" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    console.log("aefae")
    $(function () {
        $('#exampleModalCenter').modal('show');
    });
    $(document).ready(function () {
        $('#confirm-store').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('medications.confirmStore',$request->patient_id) }}",
                method: 'post',
                data: {
                    name: "{{ $request->name }}",
                    start_date: "{{ $request->start_date }}",
                    finish_date: "{{ $request->finish_date }}",
                    dosage: "{{ $request->dosage }}",
                    instuctions: "{{ $request->instuctions }}",
                    purpose: "{{ $request->purpose }}",
                    doctor_name: "{{ $request->doctor_name }}",
                    side_effects: "{{ $request->side_effects }}",
                    patient_id: "{{ $request->patient_id }}"
                },
                success: function (result) {
                    if (result.errors) {
                        $('.alert-danger').html('');

                        $.each(result.errors, function (key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<li>' + value + '</li>');
                        });
                    } else {
                        console.log("success");
                        window.location =
                            "{{ route('appointments-tests.show', $request->patient_id) }}"
                    }
                }

            });
        });
    });

</script>
@endif
{{-- END OF MODAL --}}

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#start_date');
    flatpickr('#finish_date');

</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .move-context {
        margin-bottom: 80px
    }

</style>
@endsection
