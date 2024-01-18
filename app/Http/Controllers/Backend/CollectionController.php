<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.collections.index');
        $collections = Collection::get();
        return view('backend.product.collections.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user('admin')->authorizePermission('app.collections.create');
        $statusCollection = Collection::status();
        $status = $statusCollection['status'];
        return view('backend.product.collections.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.collections.create');
        $rules = [
                'name' => ['required', 'string', 'max:255']
        ];
        
        $customMessages = [
                'name.required' => 'Shkruani Emrin e koleksionit!',
        ];

        $this->validate($request, $rules, $customMessages);
        $collection = new Collection;
         //upload the collections icon
        if($request->hasFile('icon'))
        {
            $image_tmp = $request->file('icon');
            if($image_tmp->isValid()){
                //get icon extension
                $extension = $image_tmp->getClientOriginalExtension();
                $file = $request->file('icon')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);

                $iconName = $filename . '-' .rand(111, 99999).'.'.$extension;
                $imagePath = 'images/collections/icon/'.$iconName;
                //upload the icon
                Image::make($image_tmp)->save($imagePath);
                //save collections icon
                $collection->icon = $iconName;
            }
        }
         //upload the collections banner
        if($request->hasFile('image'))
        {
            $tmp_banner = $request->file('image');
            if($tmp_banner->isValid()){
                //get image extension
                $extension = $tmp_banner->getClientOriginalExtension(); 
                $file = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $imageNameBanner = $filename . '-' .rand(111, 99999).'.'.$extension;
                $imagePath = 'images/collections/banner/'.$imageNameBanner;
                //upload the image
                Image::make($tmp_banner)->save($imagePath);
                //save collections image
                $collection->image = $imageNameBanner;
            }
        }
        
        $collection->name = $request->name;
        if ($request->slug != null) {
            $collection->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $collection->slug));
        }
        else {
            $collection->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $collection->name));
        }
        $collection->description = $request->description;

        $product_ids = collect($request->product_ids);
        $collection_ids = [];
        foreach($product_ids as $keyProduct => $product_id) {
            array_push($collection_ids, (int)$product_id);
        }
        $collection->products = implode(",", $collection_ids);
        $collection->save();
        
        // $collection->attributes()->sync($request->attribute_id);
        // $collection->filterAttributes()->sync($request->filter_attribute_id);
        
        $notification = array(
            'message' => 'Koleksioni u shtua me sukses.',
            'alert-type' => 'success'
        );
        return redirect('app/collections')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Collection $collection)
    {
        $request->user('admin')->authorizePermission('app.collections.edit');
        $statusCollection = Collection::status();
        $status = $statusCollection['status'];
        $products = [];
        foreach(explode(",", $collection->products) as $keyProducts => $collectionProduct) {
            array_push($products, Product::where('id', (int)$collectionProduct)->first());
        }
        return view('backend.product.collections.edit', compact('status', 'collection', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $request->user('admin')->authorizePermission('app.collections.edit');
        $rules = [
                'name' => ['required', 'string', 'max:255']
        ];
        
        $customMessages = [
                'name.required' => 'Shkruani Emrin e koleksionit!',
        ];

        $this->validate($request, $rules, $customMessages);
        //upload the collections icon
        if($request->hasFile('icon'))
        {
            $image_tmp = $request->file('icon');
            if($image_tmp->isValid()){
                //get icon extension
                $extension = $image_tmp->getClientOriginalExtension();
                
                $file = $request->file('icon')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $iconName = $filename . '-' .rand(111, 99999).'.'.$extension;
                $imagePath = 'images/collections/icon/'.$iconName;
                //upload the icon
                Image::make($image_tmp)->save($imagePath);
                //save collections icon
                $collection->icon = $iconName;
            }
        }
        //upload the collections banner
        if($request->hasFile('image'))
        {
            $tmp_banner = $request->file('image');
            if($tmp_banner->isValid()){
                //get image extension
                $extension = $tmp_banner->getClientOriginalExtension();
                $file = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $imageNameBanner = $filename . '-' .rand(111, 99999).'.'.$extension;
                $imagePath = 'images/collections/banner/'.$imageNameBanner;
                //upload the image
                Image::make($tmp_banner)->save($imagePath);
                //save collections image
                $collection->image = $imageNameBanner;
            }
        }
        $product_ids = collect($request->product_ids);
        $collection_ids = [];
        foreach($product_ids as $keyProduct => $product_id) {
            array_push($collection_ids, (int)$product_id);
        }
        $collection->products = implode(",", $collection_ids);
        $collection->name = $request->name;
        if ($request->slug != null) {
            $collection->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $collection->slug));
        }
        else {
            $collection->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $collection->name));
        }
        $collection->description = $request->description;
        $collection->update();
        // $collection->attributes()->sync($request->attribute_id);
        // $collection->filterAttributes()->sync($request->filter_attribute_id);
        
        $notification = array(
            'message' => 'Koleksioni u shtua me sukses.',
            'alert-type' => 'success'
        );
        return redirect('app/collections')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Collection $collection)
    {
        $request->user('admin')->authorizePermission('app.collections.destroy');
        $collection->delete();
        
        $notification = array(
            'message' => 'Koleksioni i produkteve u fshi me sukses',
            'alert-type' => 'success'
        );   
        
        return back()->with($notification);
    }
}
