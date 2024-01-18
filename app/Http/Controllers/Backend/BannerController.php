<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.banners.index');
        $sliders = Slider::orderBy('order', 'asc')->get();
        $banners = Banner::orderBy('order', 'asc')->get();
        return view('backend.banners.index', compact('sliders','banners'));
    }

    public function create(Request $request)
    {
        $request->user('admin')->authorizePermission('app.banners.create');
        $type = Banner::bannerType();
        $banner_types = $type['banner_type'];
        $categories = Category::where('parent_id', NULL)->get();
        return view('backend.banners.create', compact('banner_types', 'categories'));
    }

    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.banners.create');
        $validator = Validator::make($request->all(), [
            'order' =>'required',
            'image' =>'required',
         ]);
         if($validator->fails()) {
            session()->flash('message', 'Slider nuk mund të shtohet: ' . $validator->messages()->first());
            session()->flash('class', 'danger');
            return redirect()->back();
         }

        $banner = new Banner();
        
        if($request->hasFile('image')):
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()):
                //Get Original Image Name
                $image_extension = $image_tmp->getClientOriginalName();
                $image_name = pathinfo($image_extension, PATHINFO_FILENAME);
                //Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate new image name
                $imageName = $image_name.'-'.rand(111, 999999999).'.'.$extension;
                if($request->has('banner_type') && $request->banner_type == 'col_1')
                {
                    if($extension == 'gif')
                    {
                        $image_tmp->move(public_path('images/banners/large/'), $imageName);
                    }else
                    {
                        $image_path_large  = public_path('images/banners/large/').$imageName;
                        Image::make($image_tmp)->save($image_path_large);
                    }
                   
                }else if($request->has('banner_type') && $request->banner_type == 'col_2'){
                    
                    if($extension == 'gif')
                    {
                        $image_tmp->move(public_path('images/banners/medium/'), $imageName);
                    }else
                    {
                        $image_path_medium = public_path('images/banners/medium/').$imageName;
                        Image::make($image_tmp)->resize(830, 450)->save($image_path_medium);
                    }
                } else {
                    if($extension == 'gif')
                    {
                        $image_tmp->move(public_path('images/banners/medium/'), $imageName);
                    }else
                    {
                        $image_path_medium = public_path('images/banners/medium/').$imageName;
                        Image::make($image_tmp)->resize(450, 600)->save($image_path_medium);
                    }
                }
                //Save image in db
                $banner->image = $imageName; 
            endif;
        else:
            $banner->image = "";
        endif;

        $banner->position     = $request->position;
        $banner->category_id  = $request->banner_category;

        $banner->banner_type  = $request->banner_type;
        $banner->order        = $request->order;
        $banner->link         = $request->link;
        $banner->save();

        $notification = array(
            'message' => 'Baneri u shtua me sukses!',
            'alert-type' => 'success'
         );
        return redirect()->route('banners.index')->with($notification);
    }

    public function show(Banner $banner)
    {
        //
    }

    public function edit(Request $request, Banner $banner)
    {
        $request->user('admin')->authorizePermission('app.banners.edit');
        $type = Banner::bannerType();
        $banner_types = $type['banner_type'];
        $categories = Category::where('parent_id', NULL)->get();
        return view('backend.banners.create', compact('banner','banner_types', 'categories'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->user('admin')->authorizePermission('app.banners.edit');
        $validator = Validator::make($request->all(), [
            'order' =>'required'
         ]);
         if($validator->fails()) {
            session()->flash('message', 'Baneri nuk mund të shtohet: ' . $validator->messages()->first());
            session()->flash('class', 'danger');
            return redirect()->back();
         }

         $banner->update([
            'order' => $request->order,
            'link'  => $request->link,
            'banner_type' => $request->banner_type
         ]);

         if($request->hasFile('image')):
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()):
                //Get Original Image Name
                $image_extension = $image_tmp->getClientOriginalName();
                $image_name = pathinfo($image_extension, PATHINFO_FILENAME);
                //Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate new image name
                $imageName = $image_name.'-'.rand(111, 999999999).'.'.$extension;
                if($request->has('banner_type') && $request->banner_type == 'col_1')
                {
                    if($extension == 'gif')
                    {
                        $image_tmp->move(public_path('images/banners/large/'), $imageName);
                    }else
                    {
                        $image_path_large  = public_path('images/banners/large/').$imageName;
                        Image::make($image_tmp)->save($image_path_large);
                    }
                   
                }else{
                    
                    if($extension == 'gif')
                    {
                        $image_tmp->move(public_path('images/banners/medium/'), $imageName);
                    }else
                    {
                        $image_path_medium = public_path('images/banners/medium/').$imageName;
                        Image::make($image_tmp)->resize(830, 450)->save($image_path_medium);
                    }
                }
                $banner->update(['image' => $imageName]); 
            endif;
        endif;

        $notification = array(
            'message' => 'Baneri është edituar me sukses!',
            'alert-type' => 'success'
         );
        return redirect()->route('banners.index')->with($notification);
    }

    public function destroy(Request $request, Banner $banner)
    {
        $banner->delete();

        $notification = array(
            'message' => 'Banner u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function statusChange(Request $request)
    {
        $request->user('admin')->authorizePermission('app.banners.destroy');
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Banner::where('id', $data['banner_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'banner_id' => $data['banner_id']]);
        }
    }
}