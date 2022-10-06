@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Product {{ $product->id }}</h3>
                    @can('view-' . str_slug('Products'))
                        <a class="btn btn-success pull-right" href="{{ url('/products') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $product->name }} </td>
                                </tr>
                                <tr>
                                    <th> Des </th>
                                    <td> {{ $product->des }} </td>
                                </tr>
                                <tr>
                                    <th>Product Car </th>
                                    @forelse ($product->car as $product_car)
                                        <td> {{ $product_car->car_name }} </td> <br>
                                    @empty
                                        <p>no car to this found</p>
                                    @endforelse
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
