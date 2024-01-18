<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FilterAttribute;
use App\Models\FilterAttributeValue;
use Illuminate\Http\Request;

class FilterAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.filter-attributes.index');
        $filter_attributes = FilterAttribute::get();
        return view('backend.product.filter-attributes.index', compact('filter_attributes'));
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
            'name' => 'required'
        ]);

        $filter_attributes = FilterAttribute::create($formFields);

        $notification = array(
            'message' => 'Detaji u shtua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilterAttribute  $filterAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FilterAttribute $filterAttribute)
    {
        $request->user('admin')->authorizePermission('app.filter-attributes.index');
        return view('backend.product.filter-attributes.show', compact('filterAttribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilterAttribute  $filterAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FilterAttribute $filterAttribute)
    {
        $request->user('admin')->authorizePermission('app.filter-attributes.edit');
        return view('backend.product.filter-attributes.edit', compact('filterAttribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilterAttribute  $filterAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FilterAttribute $filterAttribute)
    {
        $request->user('admin')->authorizePermission('app.filter-attributes.edit');
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        $filterAttribute->update($formFields);

        $notification = array(
            'message' => 'Detaji  u ndryshua me sukses!',
            'alert-type' => 'success'
        );

        return redirect('app/filter-attributes')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilterAttribute  $filterAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FilterAttribute $filterAttribute)
    {
        $request->user('admin')->authorizePermission('app.filter-attributes.destroy');
        FilterAttributeValue::where('filter_attribute_id', $filterAttribute->id)->delete();
        $filterAttribute->delete();

        $notification = array(
            'message' => 'Detaji u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
