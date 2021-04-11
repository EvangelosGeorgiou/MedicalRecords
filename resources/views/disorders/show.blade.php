@extends('layouts.medical_record')

@section('content')
<div class="move-context">
    <div class="card container">
        <div class="card-header">
            <h4>{{ $patients->name." ". $patients->surname }}</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <label>Disease Name</label>
                        <p>{{ $disorder->icdCodeInfo['name'] }}</p>
                    </div>

                    @if($disorder->description != null)
                    <div>
                        <label>Description</label>
                        <p>{{ $disorder->description }}</p>
                    </div>
                    @else
                    <div>
                        <label>Date</label>
                        <p>{{ $disorder->date }}</p>
                    </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div>
                        <label>ICD Code</label>
                        <p>{{ $disorder->icdCodeInfo['icd_code'] }}</p>
                    </div>
                    @if($disorder->description != null)
                    <div>
                        <label>Date</label>
                        <p>{{ $disorder->date }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('css')
<style>
    label {
        color: blue;
        font-weight: bold;
    }

    p {
        color: black;
        font-weight: bold;
    }

    .move-context {
        margin-bottom: 420px
    }

</style>
@endsection
