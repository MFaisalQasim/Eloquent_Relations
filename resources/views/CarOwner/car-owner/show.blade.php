@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">CarOwner {{ $carowner->id }}</h3>
                    @can('view-'.str_slug('CarOwner'))
                        <a class="btn btn-success pull-right" href="{{ url('/car-owner') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $carowner->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $carowner->name }} </td></tr><tr><th> Des </th><td> {{ $carowner->des }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

