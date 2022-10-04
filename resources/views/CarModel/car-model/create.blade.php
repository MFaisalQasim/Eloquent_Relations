@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New CarModel</h3>
                    @can('view-'.str_slug('CarModel'))
                    <a  class="btn btn-success pull-right" href="{{url('/car-model')}}"><i class="icon-arrow-left-circle"></i> Add CarModel</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/car-model') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('CarModel.car-model.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
