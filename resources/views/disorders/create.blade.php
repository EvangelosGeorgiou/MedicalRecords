@extends('layouts.medical_record')

@section('content')
<div class="move-context mb-4">
    <div class="card container">
        <div class="card-header">
            {{ isset($disorder) ? 'Edit Patient Disorder' : ' Add Patient Dissorder' }}
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

            <form action="{{ isset($disorder) ? route('disorders.update', $disorder->id) :  route('disorders.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @if(isset($disorder))
                @method('PUT')
                @endif

                <div class="container">

                    <div class="form-group">

                        <label for="icd_code_id">Select the Disorder</label>
                        <select name="icd_code_id" id="icd_code" class="form-control icd_code_select2">

                            @if(isset($disorder))
                            <option value="{{ $disorder->icdCodeInfo['id'] }}">{{ $disorder->icdCodeInfo['icd_code'] }}
                                / {{ $disorder->icdCodeInfo['name'] }}</option>
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
                            <option value="{{ $part->name }}" @if(isset($disorder) && $disorder->body_part==$part->name)
                                selected @endif>{{ $part->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="10" rows="5"
                            class="form-control">{{ isset($disorder) ? $disorder->description : old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Date </label>
                        <input type="date" class="form-control" name="date" id="date"
                            value="{{ isset($disorder) ? $disorder->date : old('date') }}">
                    </div>

                    <input type="hidden" name="patient_id" name="patient_id" value="{{ $patients->id }}">

                    <button class="btn btn-success"
                        type="submit">{{ isset($disorder) ? 'Update Disorder' : ' Add Dissorder' }}</button>
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
    flatpickr('#date')

    $(document).ready(function () {
        $("select").select2();
    });

</script>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
@endsection
