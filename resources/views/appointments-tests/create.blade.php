@extends('layouts.medical_record')
@section('css')
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

@endsection
@section('content')
<div class="move-context mb-4">
    <div class="card container">
        <div class="card-header">
            {{ isset($visitHistory) ? 'Edit Visit Information' : 'Add Visit Information' }}
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
                action="{{ isset($visitHistory) ? route('visit-history.update', $visitHistory->id) : route('visit-history.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @if(isset($visitHistory))
                @method('PUT')
                @endif

                <div class="form-group">
                    <label for="doc_name">Doctor Name</label>
                    <input type="text" id="doc_name" name="doc_name" class="form-control"
                        placeholder="Enter doctor name"
                        value="{{ isset($visitHistory) ? $visitHistory->doc_name : old('doc_name') }}">
                </div>

                <div class="form-group">
                    <label for="doc_speciality_id">Doctor Speciality</label><br>
                    <select name="doc_speciality_id" id="doc_speciality_id" class="form-control">
                        <option value="">Choose Doctor Speciality</option>
                        @foreach($docSpeciality as $speciality)
                        <option value="{{ $speciality->id }}" @if(isset($visitHistory)) @if($speciality->id ==
                            $visitHistory->doc_speciality_id)
                            selected
                            @endif
                            @endif
                            >
                            {{ $speciality->doc_speciality }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="reason_of_visit">Reason of Visit</label>
                    <input type="text" class="form-control" name="reason_of_visit" id="reason_of_visit"
                        placeholder="Enter reason of visit"
                        value="{{ isset($visitHistory) ? $visitHistory->reason_of_visit : old('reason_of_visit') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description of the visit</label>
                    <textarea name="description" id="description" cols="10" rows="5" class="form-control"
                        placeholder="Informations about the problem of the patient">{{ isset($visitHistory) ? $visitHistory->description : old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="date">Date of Visit</label>
                    <input type="date" class="form-control" name="date" id="date"
                        value="{{ isset($visitHistory) ? $visitHistory->date : old('date') }}">
                </div>


                <input type="hidden" id="patient_id" name="patient_id" value="{{$patients->id}}">

                <button class="btn btn-success"
                    type="submit">{{isset($visitHistory) ? 'Update Information ' : 'Add Information'}}</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#dbo')

</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
