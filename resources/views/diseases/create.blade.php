@extends('layouts.medical_record')

@section('content')
<div class="move-context mb-4">
    <div class="card container">
        <div class="card-header container">
            {{ isset($disease) ? 'Edit Patient Disease' : ' Add Patient Disease' }}
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

            <form action="{{ isset($disease) ? route('diseases.update', $disease->id) : route('diseases.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @if(isset($disease))
                @method('PUT')
                @endif

                <div class="container">

                    <div class="form-group">
                        <label for="doc_name">Doctor Name</label>
                        <input type="text" name="doc_name" id="doc_name" class="form-control"
                            placeholder="Enter doctor name" value="{{ isset($disease) ? $disease->doc_name : old('doc_name') }}">
                    </div>

                    <div class="form-group">

                        <label for="icd_code_id">Select the Disease</label>
                        {{-- <input type="text" name="icd_code_id" id="icd_code_id" class="form-control icd_code_id" autocomplete="off" value="{{ isset($disease) ? $disease->icdCodeInfo['icd_code'].'/ ' .$disease->icdCodeInfo['name'] : '' }}">
                        <div id="icd_codes"></div> --}}
                        <select name="icd_code_id" id="icd_code" class="form-control">

                            @if(isset($disease))
                            <option value="{{ $disease->icdCodeInfo['id'] }}">{{ $disease->icdCodeInfo['icd_code'] }} /
                                {{ $disease->icdCodeInfo['name'] }}</option>
                            <option value="">Select a disease...</option>
                            @else
                            <option value="">Select a disease...</option>
                            @endif
                            @foreach ($icdCode as $code)
                            <option value="{{ $code->id }}">{{ $code->icd_code }} / {{ $code->name }}</option>
                            @endforeach

                        </select>
                        @csrf
                    </div>

                    <div class="form-group">
                        <label for="body_part">Body Part</label>
                        <select name="body_part" id="body_part" class="form-control">
                            <option value="">Select a body part...</option>
                            @foreach($body_parts as $part)
                            <option value="{{ $part->name }}" @if(isset($disease) && $disease->body_part==$part->name)
                                selected @endif>{{ $part->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="hidden" name="description" id="description"
                            value="{{ isset($disease) ? $disease->description : old('description') }}">
                        <trix-editor input="description"></trix-editor>
                    </div>

                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <input type="hidden" name="diagnosis" id="diagnosis"
                            value="{{ isset($disease) ? $disease->diagnosis : old('diagnosis') }}">
                        <trix-editor input="diagnosis"></trix-editor>
                    </div>

                    <div class="form-group">
                        <label for="symptoms">Symptoms</label>
                        <input type="hidden" name="symptoms" id="symptoms"
                            value="{{ isset($disease) ? $disease->symptoms : old('symptoms') }}">
                        <trix-editor input="symptoms"></trix-editor>
                    </div>

                    <div class="form-group">
                        <label for="date">Date </label>
                        <input type="date" class="form-control" name="date" id="date"
                            value="{{ isset($disease) ? $disease->date : old('date') }}">
                    </div>

                    <input type="hidden" name="patient_id" name="patient_id" value="{{ $patients->id }}">

                    <button class="btn btn-success" type="submit">
                        {{ isset($disease) ? 'Update Patient Disease' : 'Add Patient Disease' }} </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    flatpickr('#date');


    $(document).ready(function () {
        $("select").select2();
    });

</script>


@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
@endsection
