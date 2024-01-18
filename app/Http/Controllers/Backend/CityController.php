<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.countries.index');
        $cities = City::all();
        $countries = Country::all();

        return view('backend.countries.cities.index', compact('cities', 'countries'));
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
            'name' => 'required',
            'country_id' => 'required',
            'cost' => 'nullable',
            'status' => 'required'
        ]);

        $attributes = City::create($formFields);

        $notification = array(
            'message' => 'Qyteti u krijua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, City $city)
    {
        $request->user('admin')->authorizePermission('app.countries.edit');
        $countries = Country::all();

        return view('backend.countries.cities.edit', compact('city', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->user('admin')->authorizePermission('app.countries.edit');
        $formFields = $request->validate([
            'name' => 'required',
            'country_id' => 'required',
            'cost' => 'nullable'
        ]);

        $city->update($formFields);

        $notification = array(
            'message' => 'Qyteti u azhornua me sukses!',
            'alert-type' => 'success'
        );

        return redirect('app/cities')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, City $city)
    {
        $request->user('admin')->authorizePermission('app.countries.destroy');
        $city->delete();

        $notification = array(
            'message' => 'Qyteti u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    // Update City Status
    public function updateCityStatus(Request $request)
    {
        $request->user('admin')->authorizePermission('app.countries.edit');
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            City::where('id', $data['city_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'city_id' => $data['city_id']]);
        }
    }
}