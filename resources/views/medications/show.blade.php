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
                            <th>Medication Name:</th>
                            <th>{{ $medication->name }}</th>
                        </tr>

                        <tr>
                            <th>Dosage:</th>
                            <th>{{ $medication->dosage }}</th>
                        </tr>

                        <tr>
                            <th>Purpose:</th>
                            <th>{{ $medication->purpose }}</th>
                        </tr>

                        <tr>
                            <th>Instructions:</th>
                            <th>{{ $medication->instuctions }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Doctor name:</th>
                            <th>{{ $medication->doctor_name }}</th>
                        </tr>

                        <tr>
                            <th>Start Date:</th>
                            <th>{{ $medication->start_date }}</th>
                        </tr>

                        <tr>
                            <th>Finish Date:</th>
                            <th>{{ $medication->finish_date }}</th>
                        </tr>

                        <tr>
                            <th>Side effects:</th>
                            <th>{{ $medication->side_effects }}</th>
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
