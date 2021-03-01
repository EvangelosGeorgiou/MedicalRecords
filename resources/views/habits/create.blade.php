@extends('layouts.medical_record')

@section('content')

<form action="{{ route('habits.store')  }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="card container" style="width: 500px">
        <div class="card-header">
            Add Habits
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

            <div class="form-group inputs">
                <label for="name">Add Habit Name</label>
                <div class="d-flex">
                    <input type="text" id="name" name="name[]" class="form-control">
                    <button class="btn btn-primary add-btn border-0 ml-3"><i class="fas fa-plus-circle"></i></button>
                </div>
            </div>

            <input type="hidden" name="patient_id" name="patient_id" value="{{$patients->id}}">

            <button type="submit" class="btn btn-success">Add Habits</button>
        </div>
    </div>

</form>

@endsection

@section('scripts')
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
            <div class="d-flex mt-3">
                <input type="text" id="name" name="name[]" class="form-control">
                <a href="#" class="remove-lnk btn btn-danger ml-3"><i class="fas fa-minus"></i></a>
            </div>
          `); // add input field
            }
        });

        // handle click event of the remove link
        $('.inputs').on("click", ".remove-lnk", function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); // remove input field
            x--; // decrement the counter
        })

    });

</script>
@endsection

@section('css')
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
@endsection
