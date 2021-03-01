@extends('layouts.medical_record')

@section('content')

<div class="card-body">
    <div class="card-header">
        {{ isset($familyHistory) ? 'Edit Family History' : 'Add Family History' }}
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

        <form action="{{ isset($familyHistory) ? route('familyHistory.update',$familyHistory->id) : route('familyHistory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($familyHistory))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="family_member_name">Family Member Name</label>
                        <input type="text" id="family_member_name" name="family_member_name" class="form-control" placeholder="Enter family member name" value="{{ isset($familyHistory) ? $familyHistory->family_member_name : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="diagnosed_age">Diagnose Age</label>
                        <input type="number" class="form-control" name="diagnosed_age" id="diagnosed_age"
                            placeholder="Daignosed age" value="{{ isset($familyHistory) ? $familyHistory->diagnosed_age : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input  type="hidden" name="description" id="description" value="{{ isset($familyHistory) ? $familyHistory->description : '' }}">
                        <trix-editor input="description"></trix-editor>
                    </div>

                    <div class="form-group">
                        <label for="family_side">Family Side</label><br>
                        <select name="family_side" id="family_side" class="form-control">
                            <option value="">Choose Family Side</option>
                            <option value="Mother's" @if(isset($familyHistory) && $familyHistory->family_side=='Mother\'s') selected @endif>Mother</option>
                            <option value="Father's" @if(isset($familyHistory) && $familyHistory->family_side=='Father\'s') selected @endif>Father</option>
                        </select>
                    </div>

                    <button class="btn btn-success" type="submit">{{isset($familyHistory) ? 'Update Family History ' : 'Add Family History'}}</button>
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="diagnosed_year">Diagnosed Year</label>
                        <input type="number" class="form-control" name="diagnosed_year" id="diagnosed_year"
                            placeholder="Enter diagnosed year" value="{{ isset($familyHistory) ? $familyHistory->diagnosed_year : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="disease_name">Disease Name</label>
                        <input type="text" class="form-control" name="disease_name" id="disease_name"
                            placeholder="Enter disease name" value="{{ isset($familyHistory) ? $familyHistory->disease_name : '' }}" @if(isset($familyHistory))  @endif>
                    </div>

                    <div class="form-group">
                        <label for="extra_notes">Extra notes for the doctor</label>
                        <input  type="hidden" name="extra_notes" id="extra_notes" value="{{ isset($familyHistory) ? $familyHistory->extra_notes : '' }}">
                        <trix-editor input="extra_notes"></trix-editor>
                        {{-- <textarea name="extra_notes" id="extra_notes" cols="10" rows="5" class="form-control" placeholder="Enter notes for the doctor">{{ isset($familyHistory) ? $familyHistory->extra_notes : '' }}</textarea> --}}
                    </div>



                    <input type="hidden" name="patient_id" id="patient_id" value="{{ $patients->id }}" >
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

