@extends('layouts.home_page')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="margin-left: 222px">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Patients Information</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Identity Number</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
                @foreach($patients as $patient)
              <tr>
                <td>{{ $patient->identity_number }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->surname }}</td>
                <td>{{ $patient->telephone }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->dbo }}</td>
                <td><a href="{{ route('patient-info.show',$patient->id) }}" class="btn btn-primary btn-sm">View Medical Record</a></td>
              </tr>

              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection
