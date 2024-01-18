<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FilterAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.categories.index');
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.product.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user('admin')->authorizePermission('app.categories.create');
        $attributes = Attribute::orderBy('id', 'desc')->get();
        $filter_attributes = FilterAttribute::orderBy('id', 'desc')->get();
        return view('backend.product.categories.create', ['categories' => Category::tree()], compact('attributes', 'filter_attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.categories.create');
        $user_id = Auth::guard('admin')->user()->id;
        $rules = [
                'name' => ['required', 'string', 'max:255']
        ];
        
        $customMessages = [
                'name.required' => 'Enter category name',
        ];

        $this->validate($request, $rules, $customMessages);
        $category = new Category;
         //upload the category icon
        if($request->hasFile('icon'))
        {
            $image_tmp = $request->file('icon');
            if($image_tmp->isValid()){
                //get icon extension
                $extension = $image_tmp->getClientOriginalExtension();
                //generate new icon
                $iconName = rand(111, 99999).'.'.$extension;
                $imagePath = 'backend/assets/images/products/category/icons/'.$iconName;
                //upload the icon
                Image::make($image_tmp)->resize(400, 400)->save($imagePath);
                //save category icon
                $category->icon = $iconName;
            }
        }
         //upload the category banner
        if($request->hasFile('banner'))
        {
            $tmp_banner = $request->file('banner');
            if($tmp_banner->isValid()){
                //get image extension
                $extension = $tmp_banner->getClientOriginalExtension();
                //generate new image
                $imageNameBanner = rand(111, 99999).'.'.$extension;
                $imagePath = 'backend/assets/images/products/category/banners/'.$imageNameBanner;
                //upload the image
                Image::make($tmp_banner)->resize(1920, 360)->save($imagePath);
                //save category image
                $category->banner = $imageNameBanner;
            }
        }
        
        //$category->icon = $request->icon;
        //$category->banner = $request->banner;
        $category->user_id = $user_id;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->url = $request->name;
        if($request->parent_id == null) {
            $parent_id = 0;
        }
        if ($request->slug != null) {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)).'-'.$parent_id;
        }
        else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.$parent_id;
        }
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        $category->attributes()->sync($request->attribute_id);
        $category->filterAttributes()->sync($request->filter_attribute_id);
        
        $notification = array(
            'message' => 'Kategoria e produktit u shtua me sukses.',
            'alert-type' => 'success'
        );
        return redirect('app/categories')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {
        $request->user('admin')->authorizePermission('app.categories.edit');
        $attributes = Attribute::get();
        $filter_attributes = FilterAttribute::orderBy('id', 'desc')->get();
        $attribute_name = [];
        foreach($category->attributes as $c_attribute){
            $attribute_name[] = $c_attribute->name;
        }
        $filter_attribute_name = [];
        foreach($category->filterAttributes as $f_attribute){
            $filter_attribute_name[] = $f_attribute->name;
        }
        return view('backend.product.categories.edit', ['categories' => Category::tree()], compact('attributes','category','filter_attributes','filter_attribute_name','attribute_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->user('admin')->authorizePermission('app.categories.edit');
        $rules = [
            'name' => ['required', 'string', 'max:255']
        ];
        
        $messages = [
            'name.required' => 'Vendos emrin e kategorisë së produktit',
        ];

        $this->validate($request, $rules, $messages);
        
         //upload the category icon
        if($request->hasFile('icon'))
        {
            $image_tmp = $request->file('icon');
            if($image_tmp->isValid()){
                //get icon extension
                $extension = $image_tmp->getClientOriginalExtension();
                //generate new icon
                $iconName = rand(111, 99999).'.'.$extension;
                $imagePath = 'backend/assets/images/products/category/icons/'.$iconName; //on server before backend must be added 'public/'
                //upload the icon
                Image::make($image_tmp)->resize(400, 400)->save($imagePath);
                //save category icon
                $category->icon = $iconName;
            }
        }
         //upload the category banner
        if($request->hasFile('banner'))
        {
            $tmp_banner = $request->file('banner');
            if($tmp_banner->isValid()){
                //get image extension
                $extension = $tmp_banner->getClientOriginalExtension();
                //generate new image
                $imageNameBanner = rand(111, 99999).'.'.$extension;
                $imagePath = 'backend/assets/images/products/category/banners/'.$imageNameBanner;
                //upload the image
                Image::make($tmp_banner)->resize(1920, 360)->save($imagePath);
                //save category image
                $category->banner = $imageNameBanner;
            }
        }
        
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->url = $request->name;
        if ($request->slug != null) {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name));
        }
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->update();

        $category->attributes()->detach($request->attribute_id);
        $category->filterAttributes()->detach($request->filter_attribute_id);

        $category->attributes()->sync($request->attribute_id);
        $category->filterAttributes()->sync($request->filter_attribute_id);
        
        $notification = array(
            'message' => 'Kategoria e produktit u azhornua me sukses',
            'alert-type' => 'success'
        );
        return redirect('app/categories')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $request->user('admin')->authorizePermission('app.categories.destroy');
        $category->delete();
        
        $notification = array(
            'message' => 'Kategoria e produktit u fshi me sukses',
            'alert-type' => 'success'
        );   
        
        return back()->with($notification);
    }
    
    ##update category status
    public function updateCategoryStatus(Request $request)
    {
        $request->user('admin')->authorizePermission('app.categories.edit');
        if($request->ajax())
        {
            $data = $request->all();
        
            if($data['status'] == "Active")
            {
                $status = 0;
            }else{
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'category_id'=>$data['category_id']]);
        }
    }
}
