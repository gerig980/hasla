<?php

namespace App\Http\Controllers\Backend;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.attributes.index');
        $colors = Color::get();
        return view('backend.product.colors.index', compact('colors'));
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
        $rules= [
            'name' => 'required|min:3|max:20',
            'code' => 'required|regex:/(#)/',
        ];

        DB::beginTransaction();
        try {
            $color       = new Color();
            $color->name = $request->name;
            $color->code = $request->code;
            $color->save();
            
            DB::commit();
            $notification = array(
                'message' => 'Ngjyra është shtuar me sukses!',
                'alert-type' => 'success'
            );
            return redirect()->route('app.colors.index')->with($notification);

        } catch (\Exception$e) {
            DB::rollback();

            $notification = array(
                'message' => 'Ngjyra është shtuar me gabime!',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->user('admin')->authorizePermission('app.attributes.edit');
        DB::beginTransaction();
        try {
        
            $color = Color::find($request->color_id);
            $color->update([
                'name' => $request->name,
                'code' => $request->code
            ]);

            DB::commit();
            $notification = array(
                'message' => 'Ngjyra është update-uar me sukses!',
                'alert-type' => 'success'
            );
            return redirect()->route('app.colors.index')->with($notification);
        } catch (\Exception $e) {
            DB::rollback();
          
            $notification = array(
                'message' => 'Ngjyra nuk u update-ua!',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $request->user('admin')->authorizePermission('app.attributes.destroy');
        $color = Color::find($id);

        $color->delete();

        $notification = array(
            'message' => 'Ngjyra u Fshi me suskses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
