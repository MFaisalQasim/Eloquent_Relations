@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">CarProdDate {{ $carproddate->id }}</h3>
                    @can('view-'.str_slug('CarProdDate'))
                        <a class="btn btn-success pull-right" href="{{ url('/car-prod-date') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $carproddate->id }}</td>
                            </tr>
                            <tr><th> Car Model Id </th><td> {{ $carproddate->car_model_id }} </td></tr><tr><th> Date </th><td> {{ $carproddate->date }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

