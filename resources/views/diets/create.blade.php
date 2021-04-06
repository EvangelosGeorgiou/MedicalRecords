@extends('layouts.medical_record')

@section('content')
<div class="move-context">
    <div class="card container">
        <div class="card-header container">
            {{ isset($diets) ? 'Edit Diet Infromation' : 'Add Diet Information' }}
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

            <form action="{{ isset($diets) ? route('diets.update', $diets->id) : route('diets.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                @if(isset($diets))
                @method('PUT')
                @endif

                <div class="container">

                    <div class="form-group">
                        <label for="description">Diet Description</label>
                        <input type="hidden" name="description" id="description"
                            value="{{ isset($diets) ? $diets->description : '' }}">
                        <trix-editor input="description"></trix-editor>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Diet Date Begin</label>
                        <input type="start_date" class="form-control" name="start_date" id="start_date"
                            value="{{ isset($diets) ? $diets->start_date : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="finish_date">Diet Date Finish</label>
                        <input type="date" class="form-control" name="finish_date" id="finish_date"
                            value="{{ isset($diets) ? $diets->finish_date : '' }}">
                    </div>

                    <input type="hidden" name="patient_id" name="patient_id" value="{{$patients->id}}">

                    <button class="btn btn-success"
                        type="submit">{{isset($diets) ? 'Update Diet Informatiion ' : 'Add Diet Information'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#finish_date')
    flatpickr('#start_date')

</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
     .move-context{
        margin-bottom: 200px
    }
</style>
@endsection
