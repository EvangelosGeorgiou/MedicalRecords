@extends('layouts.medical_record')

@section('content')

<div class="card-body">
    <div class="card-header container">
        Add Test
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

        <form action="{{ isset($test) ? route('tests.update',$test->id) : route('tests.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($test))
                @method('PUT')
            @endif

                <div class="container">

                    <div class="form-group">
                        <label for="testName">Test name</label>
                        <input type="text" id="testName" name="testName" class="form-control" placeholder="Enter test name" value="{{ isset($test) ? $test->testName : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="testReason">Test reason</label>
                        <input type="text" id="testReason" name="testReason" class="form-control" placeholder="Enter the reason of the test" value="{{ isset($test) ? $test->testReason : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="place">Place test taken</label>
                        <input type="text" id="place" name="place" class="form-control" placeholder="Enter the place test took place" value="{{ isset($test) ? $test->place : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="comments">Test Comments</label>
                        <textarea name="comments" id="comments" cols="10" rows="3" class="form-control" placeholder="Enter comments for the doctor">{{ isset($test) ? $test->comments : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Date </label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ isset($test) ? $test->date : '' }}">
                    </div>

                    <input type="hidden" name="patient_id" name="patient_id" value="{{ $patients->id }}">

                    <button class="btn btn-success" type="submit">Add Information</button>
                </div>
        </form>
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
    <link  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
@endsection
