<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Color;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.attributes.index');
        $attributes = Attribute::all();
        $colors     = Color::all();
        return view('backend.product.attributes.index', compact('attributes', 'colors'));
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
        $request->user('admin')->authorizePermission('app.attributes.create');
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        $attributes = Attribute::create($formFields);

        $notification = array(
            'message' => 'Atributi u krijua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Attribute $attribute)
    {
        $request->user('admin')->authorizePermission('app.attributes.index');
        return view('backend.product.attributes.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Attribute $attribute)
    {
        $request->user('admin')->authorizePermission('app.attributes.edit');
        return view('backend.product.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $request->user('admin')->authorizePermission('app.attributes.edit');
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        $attribute->update($formFields);

        $notification = array(
            'message' => 'Atributi u azhornua me sukses!',
            'alert-type' => 'success'
        );

        return redirect('app/attributes')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Attribute $attribute)
    {
        $request->user('admin')->authorizePermission('app.attributes.destroy');
        $attribute->delete();

        $notification = array(
            'message' => 'Atributi u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}