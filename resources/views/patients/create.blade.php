@extends(str_contains(url()->current(), 'create') ? 'layouts.home_page' : 'layouts.medical_record')

@section('content')
<div class="move-context mb-4">
<div class="card container">
    <div class="card-header">
        {{ isset($patients) ? 'Edit Patient' : 'Add Patient' }}
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

        <form action="{{ isset($patients) ? route('patients.update', $patients->id) : route('patients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($patients))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter patient name" value="{{ isset($patients) ? $patients->name : old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="patient@email.com" value="{{ isset($patients) ? $patients->email : old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="number" class="form-control" name="telephone" id="telephone" placeholder="Enter phone number" value="{{ isset($patients) ? $patients->telephone : old('telephone') }}">
                    </div>

                    <div class="form-group">
                        <label for="dbo">Date of Birth</label>
                        <input type="date" class="form-control" name="dbo" id="dbo" value="{{ isset($patients) ? $patients->dbo : old('dbo') }}">
                    </div>

                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="number" class="form-control" name="weight" id="weight" placeholder="eg. 90" value="{{ isset($patients) ? $patients->height : old('weight') }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label><br>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Choose Patient Gender</option>
                            <option value="M" @if(isset($patients) && $patients->gender=='M') selected @endif>Male</option>
                            <option value="F" @if(isset($patients) && $patients->gender=='F') selected @endif>Female</option>
                        </select>
                    </div>

                    <button class="btn btn-success" type="submit">{{isset($patients) ? 'Update Patient ' : 'Add Patient'}}</button>
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" name="surname" id="surname"
                            placeholder="Enter patient surname" value="{{ isset($patients) ? $patients->surname : old('surname') }}">
                    </div>

                    <div class="form-group">
                        <label for="identity_number">ID </label>
                        <input type="number" class="form-control" name="identity_number" id="identity_number"
                            placeholder="Enter patient id" value="{{ isset($patients) ? $patients->identity_number : old('identity_number') }}" @if(isset($patients))  @endif>
                    </div>

                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" name="nationality" id="nationality"
                            placeholder="eg. Cypriot" value="{{ isset($patients) ? $patients->nationality : old('nationality') }}">
                    </div>

                    <div class="form-group">
                        <label for="height">Height</label>
                        <input type="number" class="form-control" name="height" id="height" placeholder="Add height in cm... eg. 180"
                            step="any" min="0" value="{{ isset($patients) ? $patients->height : old('height') }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Choose Patient Status</option>
                            <option value="married" @if(isset($patients) && $patients->status=='married') selected @endif>Married</option>
                            <option value="single" @if(isset($patients) && $patients->status=='single') selected @endif>Single</option>
                            <option value="divorced" @if(isset($patients) && $patients->status=='divorced') selected @endif>Divorced</option>
                        </select>
                    </div>
                    @if(isset($patients))
                    <div class="form-group">
                        <label for="image">Profile</label>
                        <img src="{{ asset('/storage/'.$patients->image) }}" alt="profile"  height="100px" width="100px">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    @else
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    @endif

                    @if(isset($patients))
                        <input type="hidden" id="patient_id" name="patient_id" value="{{$patients->id}}">
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
          flatpickr('#dbo')
    </script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
@endsection
