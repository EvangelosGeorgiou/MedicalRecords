@extends('layouts.medical_record')

@section('content')

<div class="card container">
    <div class="card-header">
        <h4>{{ $patients->name.$patients->surname }}</h4>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <div>
                    <label>Disease Name</label>
                    <p>{{ $disease->icdCodeInfo['name'] }}</p>
                </div>

                <div>
                    <label>Doctor Name</label>
                    <p>{{ $disease->doc_name }}</p>
                </div>

                <div>
                    <label>Symptoms</label>
                    <p>{!! $disease->symptoms !!}</p>
                </div>

                <div>
                    <label>Description</label>
                    <p>{!! $disease->description !!}</p>
                </div>
            </div>
            <div class="col-md-5">
                <div>
                    <label>ICD Code</label>
                    <p>{{ $disease->icdCodeInfo['icd_code'] }}</p>
                </div>

                <div>
                    <label>Date</label>
                    <p>{{ $disease->date }}</p>
                </div>

                <div>
                    <label>Diagnosis</label>
                    <p>{!! $disease->diagnosis !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('css')
<style>
    label {
        color: blue
    }

    p {
        color: black
    }

</style>
@endsection
