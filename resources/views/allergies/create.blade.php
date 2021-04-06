@extends('layouts.medical_record')

@section('content')
<div class="move-context">
    <div class="card container mb-4">
        <div class="card-header container">
            Add Allergy
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

            <form action="{{ route('allergies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="container">

                    <div class="form-group">
                        <label for="name">Allergy Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Allergy Informations</label>
                        <input type="hidden" name="description" id="description"
                            value="{{  old('description') }}">
                        <trix-editor input="description"></trix-editor>
                    </div>

                    <div class="form-group">
                        <label for="date">Date </label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}">
                    </div>

                    <input type="hidden" name="patient_id" name="patient_id" value="{{ $patients->id }}">

                    <button class="btn btn-success" type="submit">Add Disorder</button>
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
@endsection
