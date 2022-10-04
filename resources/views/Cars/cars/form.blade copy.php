<div class="form-group {{ $errors->has('car_name') ? 'has-error' : '' }}">
    <label for="car_name" class="col-md-4 control-label">{{ 'Car Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="car_name" type="text" id="car_name" value="{{ $car->car_name or '' }}"
            required>
        {!! $errors->first('car_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('car_description') ? 'has-error' : '' }}">
    <label for="car_description" class="col-md-4 control-label">{{ 'Car Description' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="car_description" type="text" id="car_description"
            value="{{ $car->car_description or '' }}">
        {!! $errors->first('car_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
