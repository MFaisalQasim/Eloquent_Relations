<div class="form-group {{ $errors->has('car_model_id') ? 'has-error' : ''}}">
    <label for="car_model_id" class="col-md-4 control-label">{{ 'Car Model Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="car_model_id" type="number" id="car_model_id" value="{{ $carproddate->car_model_id or ''}}" required>
        {!! $errors->first('car_model_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="col-md-4 control-label">{{ 'Date' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="date" type="date" id="date" value="{{ $carproddate->date or ''}}" required>
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
