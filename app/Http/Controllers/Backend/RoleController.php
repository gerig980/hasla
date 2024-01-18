<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $request->user('admin')->authorizePermission('app.roles.index');
        $roles = Role::get();
        return view('backend.admins.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $request->user('admin')->authorizePermission('app.roles.create');
        $modules = Module::all();
        return view('backend.admins.roles.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function store(Request $request) {
        $request->user('admin')->authorizePermission('app.roles.create');
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        if ($validator->fails()) {
            $notification = ['message' => 'Roli nuk mund te shtohet: '.$validator->messages()->first(), 'alert-type' => 'error'];
            return redirect()->back()->withInput()->with($notification);
        }

        $name = $request->input('name');
        $permissionIds = $request->input('permissions');

        $role = Role::create([
            'name' => $name,
            'slug' => Str::slug($name)
        ]);

        $role->permissions()->sync($permissionIds);

        $notification = array('message' => 'Roli u shtua me sukses!', 'alert-type' => 'success');
        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, $id) {
        $request->user('admin')->authorizePermission('app.roles.edit');
        $role = Role::findOrFail($id);
        $modules = Module::all();
        return view('backend.admins.roles.role', compact('role', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request  $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) {
        $request->user('admin')->authorizePermission('app.roles.edit');
        $role = Role::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,'.$role->id,
            'permissions' => 'required|array',
        ]);

        if ($validator->fails()) {
            $notification = ['message' => 'Roli nuk mund te shtohet: '.$validator->messages()->first(), 'alert-type' => 'error'];
            return redirect()->back()->withInput()->with($notification);
        }

        $name = $request->input('name');
        $permissionIds = $request->input('permissions');

        $role->update([
            'name' => $name,
            'slug' => Str::slug($name)
        ]);

        $role->permissions()->sync($permissionIds);

        $notification = array('message' => 'Roli u modifikua me sukses!', 'alert-type' => 'success');
        return redirect()->route('roles.edit', $role->id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id) {
        $request->user('admin')->authorizePermission('app.roles.destroy');
        $role = Role::findOrFail($id);

        if (!$role->deletable) {
            $notification = ['message' => 'Ky rol nuk mund te fshihet!', 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }

        $done = $role->delete();

        if (!$done) {
            $notification = ['message' => 'Pati nje problem ne fshirjen e rolit!', 'alert-type' => 'error'];
        } else {
            $notification = array('message' => 'Roli u fshi me sukses!', 'alert-type' => 'success');
        }

        return redirect()->route('roles.index')->with($notification);
    }
}
