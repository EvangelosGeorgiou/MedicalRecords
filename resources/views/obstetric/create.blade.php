@extends('layouts.medical_record')

@section('content')

    <div class="card container">
        <div class="card-header">
            {{ isset($obstetric) ? 'Edit Patient Obstetric' : 'Add Patient Obstetric' }}
        </div>

        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger container">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ isset($obstetric) ? route('obstetric.update', $obstetric->id) : route('obstetric.store') }}" method="POST">
                @csrf

                @if(isset($obstetric))
                @method('PUT')
                @endif

                <div class="form-group">
                    <label for="doctor_name">Doctor Name</label>
                    <input type="text" class="form-control" name="doctor_name" id="doctor_name" placeholder="Enter doctor name" value="{{ isset($obstetric) ? $obstetric->doctor_name : '' }}">
                </div>

                <div class="form-group">
                    <label for="type">Type of pregnancy</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Select type of pregnancy...</option>
                        <option value="Intrauterine Pregnancy" @if(isset($obstetric) && ($obstetric->type == 'Intrauterine Pregnancy')) selected @endif>Intrauterine Pregnancy</option>
                        <option value="Ectopic Pregnancy and Tubal Pregnancy" @if(isset($obstetric) && ($obstetric->type == 'Ectopic Pregnancy and Tubal Pregnancy')) selected @endif>Ectopic Pregnancy and Tubal Pregnancy</option>
                        <option value="Intra-Abdominal Pregnancy" @if(isset($obstetric) && ($obstetric->type == 'Intra-Abdominal Pregnancy')) selected @endif>Intra-Abdominal Pregnany</option>
                        <option value="Singlet Pregnancy" @if(isset($obstetric) && ($obstetric->type == 'Singlet Pregnancy')) selected @endif>Singlet Pregnancy</option>
                        <option value="Multiple Pregnancy" @if(isset($obstetric) && ($obstetric->type == 'Multiple Pregnancy')) selected @endif>Multiple Pregnancy</option>
                        <option value="Lupus Pregnancy" @if(isset($obstetric) && ($obstetric->type == 'Lupus Pregnancy')) selected @endif>Lupus Pregnancy</option>
                        <option value="Molar Pregnancy" @if(isset($obstetric) && ($obstetric->type == 'Molar Pregnancy')) selected @endif>Molar Pregnancy</option>
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label for="child_name">Children/s Name</label>
                    <input  type="hidden" name="child_name" id="child_name" value="{{ isset($obstetric) ? $obstetric->child_name : '' }}">
                    <trix-editor input="child_name"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="child_sex">Child Sex</label>
                    <select name="child_sex" id="child_sex" class="form-control">
                        <option value="">Select child sex...</option>
                        <option value="M" @if(isset($obstetric) && ($obstetric->child_sex == 'M')) selected @endif>Male</option>
                        <option value="F" @if(isset($obstetric) && ($obstetric->child_sex == 'F')) selected @endif>Female</option>
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="complications">Pregnancy Complications</label>
                    <input  type="hidden" name="complications" id="complications" value="{{ isset($obstetric) ? $obstetric->complications : '' }}">
                    <trix-editor input="complications"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ isset($obstetric) ? $obstetric->date : '' }}">
                </div>

                <div class="form-group">
                    <label for="number_of_childer">Number of Children/s</label>
                    <input type="number" name="number_of_childer" id="number_of_childer" class="form-control" value="{{ isset($obstetric) ? $obstetric->number_of_childer : '' }}" onchange="addChildren()">
                </div>

                <div class="childrens-div"></div>

                <input type="hidden" name="patient_id" name="patient_id" value="{{ $patients->id }}">

                <button class="btn btn-success" type="submit">{{ isset($obstetric) ? 'Update Obstetric' : 'Add Obstetric' }}</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
         // flatpickr('#date');


    </script>

    <script>
        function addChildren(){
              var number = document.getElementById("number_of_childer").value;
              $('.childrens-div > div ').html('');

              for(var i=0;i<number;i++){
                $('.childrens-div').append(`
                <div class="form-group">
                    <label for="child_name">Children Name</label>
                    <input  type="text" class="form-control" name="childrens[`+i+`][name]" id="child_name" value="{{ isset($obstetric) ? $obstetric->child_name : '' }}">
                </div>

                <div class="form-group">
                    <label for="child_sex">Child Sex</label>
                    <select name="childrens[`+i+`][sex]" id="child_sex" class="form-control">
                        <option value="">Select child sex...</option>
                        <option value="M" @if(isset($obstetric) && ($obstetric->child_sex == 'M')) selected @endif>Male</option>
                        <option value="F" @if(isset($obstetric) && ($obstetric->child_sex == 'F')) selected @endif>Female</option>
                    </select>
                </div>
                `)
              }
          }
    </script>
@endsection
