@foreach($attributes as $attribute)
    <div class="form-group row">
        <div class="col-md-3">
            <input type="text" class="form-control" value="{{ $attribute->name }}" disabled>
        </div>
        <div class="col-md-9">
            <select class="form-control js-example-basic-multiple variant" name="attribute_values_{{$attribute->id}}[]" multiple>
                @foreach($attribute->attribute_value as $value)
                    <option value="{{ $value->id }}" {{  $request->has('attribute_values_'.$attribute->id) ? (in_array($value->id , $request['attribute_values_'.$attribute->id]) ? 'selected' : '') : '' }}>{{ $value->value }}</option>
                @endforeach
            </select>
            <p class="text-info">Për cdo ngjyrë të përsëritur, shtoni fotot vetëm në fushën e parë!</p>
        </div>
    </div>
@endforeach
