<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.tags.index');
        $tags = Tag::lazy();
        return view('backend.product.tags.index', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.tags.create');
        $validator = $request->validate([
            'name' => 'required|unique:tags'
        ]);

        $createTag = Tag::create([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Tag-u u krijua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->user('admin')->authorizePermission('app.tags.edit');
        $validator = $request->validate([
            'name' => 'required|unique:tags'
        ]);

        $tag->update([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Tag-u u ndryshua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tag $tag)
    {
        $request->user('admin')->authorizePermission('app.tags.destroy');
        $tag->delete();

        $notification = array(
            'message' => 'Tag-u u fshi me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
