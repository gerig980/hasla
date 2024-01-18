@php
    $products = \App\Models\Product::select('products.id', 'products.price', 'products.name')
            ->find($data);
@endphp

<table class="table table-responsive table-bordered table-hover table-md">
    <tbody>
    <tr class="currency-table-header">
        <th>{{ __('#') }}</th>
        <th>{{ __('Produkti') }}</th>
        <th>{{ __('Cmimi') }}</th>
        <th>{{ __('Discount') }}</th>
        <th>{{ __('Tipi Discount') }}</th>
    </tr>
    @foreach ($products as $key => $product)
        <tr id="row_{{ $product->id }}" class="table-data-row">
            <td>{{$key +1 }}</td>
            <td>
                <div class="d-flex">
                    <div>{{ $product->name}}</div>
                </div>
            </td>
            <td>{{ $product->price }}</td>
            <td style="width: 20%"><input class="form-control" type="number" step="any" min="0" name="discount_{{$product->id}}" value="{{ @$request['discount_'.$product->id]  }}" required></td>
            <td style="width: 10%">
                <select class="form-control selectric"  name="discount_type_{{$product->id}}" id="symbol" required>
                    <option value="flat" {{ @$request['discount_type_'.$product->id] == 'flat' ? 'selected' : '' }}>{{ __("Flat") }}</option>
                    <option value="percentage" {{ @$request['discount_type_'.$product->id] == 'percentage' ? 'selected' : '' }}>{{ __("Percentage") }}</option>
                </select>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>




