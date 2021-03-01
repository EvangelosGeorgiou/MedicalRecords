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
                            <th>Surgery Name:</th>
                            <th>{{ $surgery->name }}</th>
                        </tr>

                        <tr>
                            <th>Doctor name:</th>
                            <th>{{ $surgery->doc_name }}</th>
                        </tr>

                        <tr>
                            <th>Complication:</th>
                            <th>{!! $surgery->complications !!}</th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Date of the surgery:</th>
                            <th>{{ $surgery->datetime }}</th>
                        </tr>

                        <tr>
                            <th>Doctor Assistants:</th>
                            <th>{!! $surgery->assistants !!}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card container mt-3 mb-3">
    <div class="card-header">Procedures</div>
    <div class="card-body">
        @foreach($surgery->proceduresInfo as $procedure)
            <div class="ml-3 procedure">
                <div>
                    <label>Procedure name:</label>
                    <p>{!! $procedure->name !!}</p>
                </div>

                <div>
                    <label>Procedure description</label>
                    <p>{!! $procedure->description !!}</p>
                </div>
            </div>
            @endforeach
    </div>
</div>

@endsection

@section('css')
<style>
    tbody tr th:first-child,
    label {
        color: blue;
        font-weight: bold;
    }

    tbody tr th:last-child,
    .procedure>div, p {
        color: black;
        font-weight: bold;
    }

</style>
@endsection
