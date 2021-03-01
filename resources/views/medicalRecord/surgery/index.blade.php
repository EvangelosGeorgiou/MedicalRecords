@extends('layouts.medical_record')

@section('content')
<h2 class="pl-4 container">{{ $patients->name }} {{ $patients->surname }} Surgery Table</h2>

  <!-- DataTales Example -->
  <div class="container">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Surgery Table</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th scope="col">Surgery Name</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th scope="col">Surgery Name</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($patients->surgeryInfo as $surgery)

                <tr>
                    <td>{{ $surgery->name }}</td>
                    <td>{{ $surgery->datetime }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('surgeries.show', $surgery->id) }}" class="btn btn-primary btn-sm mr-2">View</a>
                            <a href="{{ route('surgeries.edit', $surgery->id) }}" class="btn btn-info btn-sm mr-2">Edit</a>
                            <form action="{{ route('surgeries.destroy', $surgery->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('css')
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
@endsection

