@extends('layouts.medical_record')

@section('content')
<div class="move-context pt-3">
    <div class="card container">
        <div class="card-header">
            <h3>{{ $patients->name }} Family History</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Family Member Name:</th>
                                <th>{{ $fam_hist->family_member_name }}</th>
                            </tr>
                            <tr>
                                <th>Disease Name:</th>
                                <th>{{ $fam_hist->disease_name }}</th>
                            </tr>
                            <tr>
                                <th>Family Side:</th>
                                <th>{{ $fam_hist->family_side }}</th>
                            </tr>
                            @if( $fam_hist->description != null)
                            <tr>
                                <th>Description:</th>
                                <th>{!! $fam_hist->description !!}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Diagnosed Age:</th>
                                <th>{{ $fam_hist->diagnosed_age }}</th>
                            </tr>
                            <tr>
                                <th>Year Diagnosed:</th>
                                <th class="trix-editor">{{ $fam_hist->diagnosed_year }}</th>
                            </tr>

                            @if( $fam_hist->extra_notes != null)
                            <tr>
                                <th>Extra Notes:</th>
                                <th>{!! $fam_hist->extra_notes !!}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    tbody tr th:first-child {
        color: blue;
        text-align: left
    }

    tbody tr th:last-child {
        color: black;
        text-align: left
    }
    .move-context{
    margin-bottom: 300px
}
</style>
@endsection
