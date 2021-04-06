@extends('layouts.medical_record')

@section('content')
<div class="move-context">
    <div class="card container">
        <div class="card-header">
            <h4>{{ $patients->name." ".$patients->surname }}</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th style="width: 35%">Disease Name: </th>
                                <th>{{ $disease->icdCodeInfo['name'] }}</th>
                            </tr>

                            <tr>
                                <th>ICD Code: </th>
                                <th>{{ $disease->icdCodeInfo['icd_code'] }}</th>

                            </tr>

                            <tr>
                                <th>Symptoms: </th>
                                <th>{!! $disease->symptoms !!}</th>
                            </tr>

                            <tr>
                                <th>Description: </th>
                                <th>{!! $disease->description !!}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th style="width: 35%">Doctor Name: </th>
                                <th>{{ $disease->doc_name }}</th>
                            </tr>

                            <tr>
                                <th>Date: </th>
                                <th>{{ $disease->date }}</th>
                            </tr>

                            <tr>
                                <th>Diagnosis: </th>
                                <th>{!! $disease->diagnosis !!}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('css')
<style>
    tbody tr th:first-child {
        color: blue;
        font-weight: bold;
    }

    tbody tr th:last-child {
        color: black;
        font-weight: bold;
    }

    .move-context {
        margin-bottom: 250px
    }

</style>
@endsection
