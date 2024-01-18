<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.countries.index');
        $countries = Country::all();

        return view('backend.countries.index', compact('countries'));
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
        $request->user('admin')->authorizePermission('app.countries.create');
        $formFields = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'status' => 'required'
        ]);

        $attributes = Country::create($formFields);

        $notification = array(
            'message' => 'Shteti u krijua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Country $country)
    {
        $request->user('admin')->authorizePermission('app.countries.edit');
        return view('backend.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $request->user('admin')->authorizePermission('app.countries.edit');
        $formFields = $request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        $country->update($formFields);

        $notification = array(
            'message' => 'Shteti u azhornua me sukses!',
            'alert-type' => 'success'
        );

        return redirect('app/countries')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Country $country)
    {
        $request->user('admin')->authorizePermission('app.countries.destroy');
        $country->delete();

        $notification = array(
            'message' => 'Shteti u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    // Update Country Status
    public function updateCountryStatus(Request $request)
    {
        $request->user('admin')->authorizePermission('app.countries.edit');
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Country::where('id', $data['country_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'country_id' => $data['country_id']]);
        }
    }
}