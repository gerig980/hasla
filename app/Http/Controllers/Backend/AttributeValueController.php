<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.attributes.edit');
        $formFields = $request->validate([
            'attribute_id' => 'required',
            'value' => 'required',
            'image' => 'nullable',
            'color_code' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $imageName = $formFields['value'] . '-' . time() . rand(1, 1000) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('backend/assets/images/products/attributes/'), $imageName);
            AttributeValue::create([
                'attribute_id' => $request->attribute_id,
                'value' => $request->value,
                'image' => $imageName,
                'color_code' => $request->color_code
            ]);
        } else {
            AttributeValue::create([
                'attribute_id' => $request->attribute_id,
                'value' => $request->value,
                'color_code' => $request->color_code,
            ]);
        }

        $notification = array(
            'message' => 'Atributi u krijua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeValue $attributeValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AttributeValue $attributeValue)
    {
        $request->user('admin')->authorizePermission('app.attributes.edit');
        $attribute = Attribute::where('id', '=', $attributeValue->attribute_id)->get();

        return view('backend.product.attributes.values.edit', compact('attribute', 'attributeValue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeValue $attributeValue)
    {
        $request->user('admin')->authorizePermission('app.attributes.edit');
        $formFields = $request->validate([
            'value' => 'required',
            'color_code' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $imageName = $formFields['value'] . '-' . time() . rand(1, 1000) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('backend/assets/images/products/attributes/'), $imageName);
            $formFields['image'] = $imageName;
        }

        $attributeValue->update($formFields);

        $notification = array(
            'message' => 'Atributi u azhornua me sukses!',
            'alert-type' => 'success'
        );

        return redirect('app/attributes')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AttributeValue $attributeValue)
    {
        $request->user('admin')->authorizePermission('app.attributes.destroy');
        $attributeValue->delete();

        $notification = array(
            'message' => 'Atributi u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
