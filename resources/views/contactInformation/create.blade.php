@extends('layouts.medical_record')

@section('css')
    <style>
        .move-context{
            margin-bottom: 340px
        }
    </style>
@endsection

@section('content')
<div class="move-context">
<div class="card container">
    <div class="card-header">
        {{ isset($contacts) ? 'Edit Contact Infromation' : 'Add Contact Information' }}
    </div>

    <div class="card-body">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ isset($contacts) ? route('contacts.update', $contacts->id) : route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($contacts))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" class="form-control" placeholder="Enter patient country" value="{{ isset($contacts) ? $contacts->country : old('country') }}" >
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="address" class="form-control" name="address" id="address"
                            placeholder="Enter address" value="{{ isset($contacts) ? $contacts->address : old('address') }}" >
                    </div>

                    <input type="hidden" name="patient_id" name="patient_id" value="{{$patients->id}}">

                    <button class="btn btn-success" type="submit">{{isset($contacts) ? 'Update Informatiion ' : 'Add Information'}}</button>
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city"
                            placeholder="Enter city" value="{{ isset($contacts) ? $contacts->city : old('city') }}">
                    </div>

                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="number" class="form-control" name="postal_code" id="postal_code"
                            placeholder="eg. 3080" value="{{ isset($contacts) ? $contacts->postal_code : old('postal_code') }}">
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
