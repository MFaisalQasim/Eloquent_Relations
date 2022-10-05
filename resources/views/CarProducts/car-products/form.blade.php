<div class="form-group {{ $errors->has('car_id') ? 'has-error' : ''}}">
    <label for="car_id" class="col-md-4 control-label">{{ 'Car Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="car_id" type="number" id="car_id" value="{{ ''}}" required>
        {!! $errors->first('car_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="col-md-4 control-label">{{ 'Product Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="product_id" type="number" id="product_id" value="{{ ''}}" required>
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{  'Create' }}">
    </div>
</div>
