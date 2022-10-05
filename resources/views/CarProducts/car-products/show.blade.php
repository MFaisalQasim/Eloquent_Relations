@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">CarProduct {{ $carproduct->id }}</h3>
                    @can('view-' . str_slug('CarProducts'))
                        <a class="btn btn-success pull-right" href="{{ url('/car-products') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $carproduct->id }}</td>
                                </tr>
                                <tr>
                                    <th> Car Id </th>
                                    <td> {{ $carproduct->car_id }} </td>
                                </tr>
                                <tr>
                                    <th> Product Id </th>
                                    <td> {{ $carproduct->product_id }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
