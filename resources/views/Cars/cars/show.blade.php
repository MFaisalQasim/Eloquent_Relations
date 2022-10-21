@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Car {{ $car->car_name }}</h3>
                    @can('view-' . str_slug('Car'))
                        <a class="btn btn-success pull-right" href="{{ url('/cars') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th> Car Name </th>
                                    <td> {{ $car->car_name }} </td>
                                </tr>
                                <img style="width: -webkit-fill-available;
    height: auto;" src="{{ asset('assets/images/' . $car->image_path) }} " alt=""> 
                                <tr>
                                    <th> Car Description </th>
                                    <td> {{ $car->car_description }} </td>
                                </tr>
                                <tr>
                                    <th> Car Production Date</th>
                                    <td> {{ $car->prod_date->date }} </td>
                                </tr>
                                <tr>
                                    <th> Car Headquater </th>
                                    <td> {{ $car->headquater->name }} </td>
                                </tr> 
                                @foreach ($car->car_model as $car_model_item)
                                <tr>
                                        <th> Car Model </th>
                                        <td> {{ $car_model_item->car_model }} </td>
                                        <th> Car Engine </th>
                                        @forelse ($car->engine as $car_engine_item)
                                            {{-- {{($car_model_item->id == $car_engine_item->id)}} --}}
                                            @if ($car_model_item->id == $car_engine_item->id)
                                                <td> {{ $car_engine_item->name }} </td>
                                            @else
                                            <td>no car engine found</td>
                                            @endif
                                        @endforeach
                                </tr>
                                @empty
                                <td>no record found</td>
                                @endforelse
                                <tr>
                                        <th> Car Product</th>
                                        @forelse ($car->product as $car_product)
                                            <td> {{ $car_product->name }} </td> <br>
                                        @empty
                                        <td>no product found</td>
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
