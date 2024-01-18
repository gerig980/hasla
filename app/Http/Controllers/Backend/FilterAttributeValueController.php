<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FilterAttributeValue;
use Illuminate\Http\Request;

class FilterAttributeValueController extends Controller
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
        $request->user('admin')->authorizePermission('app.filter-attributes.create');
        $formFields = $request->validate([
            'filter_attribute_id' => 'required',
            'value' => 'required',
            'image' => 'nullable',
        ]);

        FilterAttributeValue::create([
            'filter_attribute_id' => $request->filter_attribute_id,
            'value' => $request->value,
            'image' => null,
        ]);
        
        $notification = array(
            'message' => 'Vlera e detajit u shtua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilterAttributeValue  $filterAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function show(FilterAttributeValue $filterAttributeValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilterAttributeValue  $filterAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FilterAttributeValue $filterAttributeValue)
    {
        $request->user('admin')->authorizePermission('app.filter-attributes.edit');
        return view('backend.product.filter-attributes.filter-attribute-values.edit', compact('filterAttributeValue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilterAttributeValue  $filterAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FilterAttributeValue $filterAttributeValue)
    {
        $request->user('admin')->authorizePermission('app.filter-attributes.edit');
        $formFields = $request->validate([
            'value' => 'required',
        ]);

        $filterAttributeValue->update($formFields);

        $notification = array(
            'message' => 'Vlera e Detajit u ndryshua me sukses!',
            'alert-type' => 'success'
        );

        return redirect('app/filter-attributes')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilterAttributeValue  $filterAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FilterAttributeValue $filterAttributeValue)
    {
        $request->user('admin')->authorizePermission('app.filter-attributes.destroy');
        $filterAttributeValue->delete();

        $notification = array(
            'message' => 'Vlera e Detajit u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
