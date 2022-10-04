<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ '' }}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('car_model_id') ? 'has-error' : '' }}">
    <label for="car_model_id" class="col-md-4 control-label">{{ 'Car  Model Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="car_model_id" type="text" id="car_model_id" value="{{ '' }}"
            required>
        {!! $errors->first('car_model_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('engine_model') ? 'has-error' : '' }}">
    <label for="engine_model" class="col-md-4 control-label">{{ 'Engine Model' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="engine_model" type="text" id="engine_model" value="{{ '' }}"
            required>
        {!! $errors->first('engine_model', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ 'Create' }}">
    </div>
</div>
