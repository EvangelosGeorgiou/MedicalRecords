@extends('layouts.medical_record')

@section('content')

<div class="card container">
    <div class="card-header">
        <h4>{{ $patients->name.$patients->surname }}</h4>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Test Name:</th>
                            <th>{{ $test->testName }}</th>
                        </tr>

                        <tr>
                            <th>Reason of the test:</th>
                            <th>{{ $test->testReason }}</th>
                        </tr>

                        @if($test->comments != '')
                        <tr>
                            <th>Comments:</th>
                            <th>{{ $test->comments }}</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Date:</th>
                            <th>{{ $test->date }}</th>
                        </tr>

                        <tr>
                            <th>Place of the test:</th>
                            <th>{{ $test->place }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
<style>
    tbody tr th:first-child {
        color: blue
    }

    tbody tr th:last-child {
        color: black
    }

</style>
@endsection
