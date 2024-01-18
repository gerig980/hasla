<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SizeGuide;
use App\Models\SizeGuideValue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SizeGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.size-guides.index');
        $sizeGuides = SizeGuide::all();
        return view('backend.product.size-guides.index', compact('sizeGuides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user('admin')->authorizePermission('app.size-guides.create');
        $countrySize = SizeGuide::countrySize();
        $country_size = $countrySize['country_size'];
        return view('backend.product.size-guides.create', compact('country_size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.size-guides.create');
        $user_id = Auth::guard('admin')->user()->id;
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $sizeGuide = new SizeGuide;

        if ($request->hasFile('image')) {
            $file = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $imageName = $filename . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('backend/assets/images/products/size-guides/'), $imageName);
            $sizeGuide->image = $imageName;
        }

        $sizeGuide->user_id = $user_id;
        $sizeGuide->title = $request->title;
        $sizeGuide->type = $request->type;
        $sizeGuide->description = $request->description;
        $sizeGuide->save();

        $notification = array(
            'message' => 'Guida permasave u shtua me sukses!',
            'alert-type' => 'success'
        );

        redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SizeGuide  $sizeGuide
     * @return \Illuminate\Http\Response
     */
    public function show(SizeGuide $sizeGuide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SizeGuide  $sizeGuide
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SizeGuide $sizeGuide)
    {
        $countrySize = SizeGuide::countrySize();
        $country_size = $countrySize['country_size'];

        return view('backend.product.size-guides.edit', compact('sizeGuide', 'country_size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SizeGuide  $sizeGuide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SizeGuide $sizeGuide)
    {
        $request->user('admin')->authorizePermission('app.size-guides.edit');
        $user_id = Auth::guard('admin')->user()->id;
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $imageName = $filename . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('backend/assets/images/products/size-guides/'), $imageName);
            $formFields['image'] = $imageName;
        }

        $sizeGuide->update($formFields);

        $formFields1 = $request->validate([
            'size' => 'required',
            'country_size_value' => 'required',
            'shoulder' => 'nullable',
            'length_tops' => 'nullable',
            'sleeve_length' => 'nullable',
            'bust' => 'nullable',
            'length_bottoms' => 'nullable',
            'waist_size' => 'nullable',
            'hip_size' => 'nullable',
            'thigh' => 'nullable',
            'crown' => 'nullable',
            'shoes_inner_length' => 'nullable',
            'platform_length' => 'nullable'
        ]);

        $sizeGuideId = $sizeGuide->id;

        if (!empty($request->size)) {
            foreach ($request->size as $key => $size) {
                $sizeGuide_value = SizeGuideValue::updateOrCreate([
                    'size_guide_id' => $sizeGuideId,
                    'size' => $request->size[$key],
                    'country_size_value' => $request->country_size_value[$key],
                    'shoulder' => $request->shoulder[$key] ?? NULL,
                    'length_tops' => $request->length_tops[$key] ?? NULL,
                    'sleeve_length' => $request->sleeve_length[$key] ?? NULL,
                    'bust' => $request->bust[$key] ?? NULL,
                    'length_bottoms' => $request->length_bottoms[$key] ?? NULL,
                    'waist_size' => $request->waist_size[$key] ?? NULL,
                    'hip_size' => $request->hip_size[$key] ?? NULL,
                    'thigh' => $request->thigh[$key] ?? NULL,
                    'crown' => $request->crown[$key] ?? NULL,
                    'shoes_inner_length' => $request->shoes_inner_length[$key] ?? NULL,
                    'platform_length' => $request->platform_length[$key] ?? NULL
                ]);
            }
        }

        $notification = array(
            'message' => 'Guida permasave u azhornua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SizeGuide  $sizeGuide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SizeGuide $sizeGuide)
    {
        $request->user('admin')->authorizePermission('app.size-guides.destroy');
        $sizeGuide->delete();

        $notification = array(
            'message' => 'Guida permasave u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteSizeGuideValue(Request $request, $id)
    {
        $request->user('admin')->authorizePermission('app.size-guides.destroy');
        SizeGuideValue::where('id', $id)->delete();

        $notification = array(
            'message' => 'Vlera e guides se permasave u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}