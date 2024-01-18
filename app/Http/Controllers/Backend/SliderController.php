<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function create(Request $request)
    {
        $request->user('admin')->authorizePermission('app.sliders.create');
        return view('backend.sliders.form');
    }

    public function edit(Request $request, Slider $slider)
    {
        $request->user('admin')->authorizePermission('app.sliders.edit');
        return view('backend.sliders.form', compact('slider'));
    }

    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.sliders.create');
        $validator = Validator::make($request->all(), [
            'order' =>'required',
            'bg_image' =>'required',
         ]);
         if($validator->fails()) {
            session()->flash('message', 'Slider nuk mund të shtohet: ' . $validator->messages()->first());
            session()->flash('class', 'danger');
            return redirect()->back();
         }

        $slider = new Slider();
        
        if($request->hasFile('bg_image')):
            $image_tmp = $request->file('bg_image');
            if($image_tmp->isValid()):
                //Get Original Image Name
                $image_extension = $image_tmp->getClientOriginalName();
                $image_name = pathinfo($image_extension, PATHINFO_FILENAME);
                //Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate new image name
                $imageName = $image_name.'-'.rand(111, 999999999).'.'.$extension;
                $bg_image_path = public_path('images/banners/large/').$imageName;
                if($extension == 'gif')
                {
                    $image_tmp->move(public_path('images/banners/large/'), $imageName);
                }else
                {
                    Image::make($image_tmp)->save($bg_image_path);
                }
                   //Save image in db
                   $slider->bg_image = $imageName; 
            endif;
        else:
            $slider->bg_image = "";
        endif;

        $slider->status       = 1;
        $slider->order        = $request->order;
        $slider->mobile_version = 0;
        $slider->link         = $request->link;
        $slider->action_type  = 'product';
        $slider->save();

        $notification = array(
            'message' => 'Slider është shtuar me sukses!',
            'alert-type' => 'success'
         );
        return redirect()->route('banners.index')->with($notification);
    }

    public function update(Request $request, Slider $slider)
    {
        $request->user('admin')->authorizePermission('app.sliders.edit');
        $validator = Validator::make($request->all(), [
            'order' =>'required'
         ]);
         if($validator->fails()) {
            session()->flash('message', 'Slider nuk mund të shtohet: ' . $validator->messages()->first());
            session()->flash('class', 'danger');
            return redirect()->back();
         }

         $slider->update([
            'order' => $request->order,
            'link'  => $request->link,
         ]);

         if($request->hasFile('bg_image')):
            $image_tmp = $request->file('bg_image');
            if($image_tmp->isValid()):
                //Get Original Image Name
                $image_extension = $image_tmp->getClientOriginalName();
                $image_name = pathinfo($image_extension, PATHINFO_FILENAME);
                //Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate new image name
                $imageName = $image_name.'-'.rand(111, 999999999).'.'.$extension;
                $bg_image_path = public_path('images/banners/large/').$imageName;
                if($extension == 'gif')
                {
                    $image_tmp->move(public_path('images/banners/large/'), $imageName);
                }else
                {
                    Image::make($image_tmp)->save($bg_image_path);
                }
                //Save image in db
                $slider->update(['bg_image' => $imageName]); 
            endif;
        endif;

        $notification = array(
            'message' => 'Slider është edituar me sukses!',
            'alert-type' => 'success'
         );
        return redirect()->route('banners.index')->with($notification);
    }

    public function destroy(Request $request, Slider $slider)
    {
        $request->user('admin')->authorizePermission('app.sliders.destroy');
        $slider->delete();

        $notification = array(
            'message' => 'Slideri u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->route('banners.index')->with($notification);
    }

    public function statusChange(Request $request)
    {
        $request->user('admin')->authorizePermission('app.sliders.edit');
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Slider::where('id', $data['slider_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'slider_id' => $data['slider_id']]);
        }
    }
}
