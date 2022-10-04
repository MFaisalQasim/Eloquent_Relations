<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ '' }}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('car_id') ? 'has-error' : '' }}">
    <label for="car_id" class="col-md-4 control-label">{{ 'Car Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="car_id" type="text" id="car_id" value="{{ '' }}" required>
        {!! $errors->first('car_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : '' }}">
    <label for="details" class="col-md-4 control-label">{{ 'Details' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="details" type="textarea" id="details">{{ '' }}</textarea>
        {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ 'Create' }}">
    </div>
</div>
