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
                                <th>{{ $obstetric->doctor_name }}</th>
                            </tr>

                            <tr>
                                <th>Type of Pregnancy:</th>
                                <th>{{ $obstetric->type }}</th>
                            </tr>

                            @foreach ($obstetric->childrens as $child)
                            <tr>
                                <th>Childer Name:</th>
                                <th>{{ $child['name'] }}</th>
                            </tr>
                            @endforeach

                            @if($obstetric->complications != '')
                            <tr>
                                <th>Pregnancy Complications:</th>
                                <th>{!! $obstetric->complications !!}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Pregnancy Day:</th>
                                <th>{{ $obstetric->date }}</th>
                            </tr>

                            <tr>
                                <th>Number of children:</th>
                                <th>{{ $obstetric->number_of_childer }}</th>
                            </tr>

                            @foreach ($obstetric->childrens as $child)
                            <tr>
                                <th>Childer Sex:</th>
                                <th>{{ $child['sex'] }}</th>
                            </tr>
                            @endforeach
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
        margin-bottom: 290px
    }

</style>
@endsection
