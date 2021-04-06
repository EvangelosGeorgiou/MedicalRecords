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
                                <th>Doctor Name:</th>
                                <th>{{ $visits->doc_name }}</th>
                            </tr>

                            <tr>
                                <th>Reason of visit:</th>
                                <th>{{ $visits->reason_of_visit }}</th>
                            </tr>
                            @if($visits->description != null)
                            <tr>
                                <th>Description of the problem:</th>
                                <th>{{ $visits->description }}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Doctor Speciality:</th>
                                <th>{{ $visits->docSpecInfo['doc_speciality'] }}</th>
                            </tr>

                            <tr>
                                <th>Date of visit:</th>
                                <th>{{ $visits->date }}</th>
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
        color: blue
    }

    tbody tr th:last-child {
        color: black
    }

    .move-context {
        margin-bottom: 350px
    }

</style>
@endsection
