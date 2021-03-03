@extends('layouts.medical_record')

@section('content')

{{-- na valo surgery type j description  --}}

<div class="container mb-3">

    <div class="card">
        <div class="card-header">
            {{ isset($surgery)? 'Edit Patient Surgery' : 'Add Patient Surgery Information' }}
        </div>

        <form action="{{ isset($surgery) ? route('surgeries.update',$surgery->id) : route('surgeries.store' ) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($surgery))
            @method('PUT')
            @endif

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

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Surgery Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter surgery name" value="{{ isset($surgery) ? $surgery->name : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="datetime">Date & Time of the Surgery</label>
                            <input type="date" class="form-control" name="datetime" id="datetime"
                                 value="{{ isset($surgery) ? $surgery->datetime : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="doc_name">Doctor name</label>
                            <input type="text" class="form-control" name="doc_name" id="doc_name"
                                placeholder="Enter doctor name who made the surgery" value="{{ isset($surgery) ? $surgery->doc_name : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="assistants">Assistants name</label>
                            <input type="hidden" name="assistants" id="assistants" value="{{ isset($surgery) ? $surgery->assistants : '' }}">
                            <trix-editor input="assistants" ></trix-editor>
                        </div>

                        <div class="form-group">
                            <label for="complications">Complications</label>
                            <input type="hidden" name="complications" id="complications" value="{{ isset($surgery) ? $surgery->complications : '' }}">
                            <trix-editor input="complications" ></trix-editor>
                        </div>

                        <div class="form-group">
                            <label for="body_part">Body Part</label>
                            <select name="body_part_id" id="body_part_id" class="form-control">
                                <option value="">Select a body part...</option>
                                @foreach($body_parts as $part)
                                    <option value="{{ $part->id }}" @if(isset($surgery) && $surgery->body_part_id==$part->id) selected @endif>{{ $part->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" id="patient_id" name="patient_id" value="{{$patients->id}}">
                    </div>
                    @if(isset($surgery))
                        <div class="col-md-6">
                            @foreach($surgery->proceduresInfo as $procedure)
                            <div class="form-group">
                                <label for="procedure_name">Procedure name</label>
                                <input type="text" class="form-control" name="procedure_name[]" id="procedure_name" value="{{ $procedure->name}}">
                            </div>

                            <div class="form-group">
                                <label for="procedure_description">Procedure Description</label>
                                <textarea cols="5" rows="3" name="procedure_description[]" id="procedure_description" class="form-control">{{ $procedure->description}}</textarea>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    @else
                    <div class="col-md-6">
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-info btn-sm add-btn">Add Procedure</button>
                        </div>
                        <div class="inputs"></div>
                        {{-- <div class="form-group">
                            <label for="procedure_name">Procedure name</label>
                            <input type="text" class="form-control" name="procedure_name" id="procedure_name">
                        </div>

                        <div class="form-group">
                            <label for="procedure_description">Procedure Description</label>
                            <input type="hidden" name="procedure_description" id="procedure_description">
                            <trix-editor input="procedure_description"></trix-editor>

                        </div> --}}
                    </div>
                    @endif
                </div>


                <div class="text-center">
                    <button class="btn btn-success" type="submit">{{ isset($surgery)? 'Update Surgery' : 'Add Surgery' }}</button>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#datetime', {
        enableTime: true
    })

</script>

{{-- Add more procedures --}}

<script type="text/javascript">
    $(document).ready(function () {

        // allowed maximum input fields
        var max_input = 5;

        // initialize the counter for textbox
        var x = 1;

        // handle click event on Add More button
        $('.add-btn').click(function (e) {
            e.preventDefault();
            if (x < max_input) { // validate the condition
                x++; // increment the counter
                $('.inputs').append(`
                <div>
                    <div class="form-group">
                        <label for="procedure_name">Procedure name</label>
                        <input type="text" class="form-control" name="procedure_name[]" id="procedure_name">
                    </div>

                    <div class="form-group">
                        <label for="procedure_description">Procedure Description</label>
                        <textarea name="procedure_description[]" id="procedure_description" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                </div>
              `); // add input field
            }
        });

        // handle click event of the remove link
        $('.inputs').on("click", ".remove-lnk", function (e) {
            e.preventDefault();
            $($this).parent('div').remove(); // remove input field
            //$('.procedure-box').parent('div').remove();
            x--; // decrement the counter
        })

    });

</script>


@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
    integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
@endsection