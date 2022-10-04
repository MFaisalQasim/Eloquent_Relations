<div class="form-group {{ $errors->has('car_model') ? 'has-error' : ''}}">
    <label for="car_model" class="col-md-4 control-label">{{ 'Car Model' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="car_model" type="text" id="car_model" value="{{ $carmodel->car_model or ''}}" required>
        {!! $errors->first('car_model', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
