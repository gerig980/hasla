<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class AdminController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $orders = Order::all();
        $sum = Order::pluck('grant_total');
        $customers = Customer::all();
        $webcustomers = User::where('role_id', 3)->get();
        $products = Product::all();
        // produktet me te shitura
        $productsOrdered = [];
        foreach($orders as $order) {
            $orderdetails = OrderDetail::where('order_id', $order->id)->pluck('product_id');
            foreach($orderdetails as $orderdetail) {
                array_push($productsOrdered, $orderdetail);
            }
        }
        
        // dd($productsCount, $products);
        return view('backend.dashboard', compact('orders', 'sum', 'customers', 'webcustomers', 'products', 'productsOrdered'));
    }

    public function indexAdmins() {
        $admins = Admin::get();
        $roles = Role::get();
        return view('backend.admins.index', compact('admins', 'roles'));
    }

    ## admin profile
    public function settings() {
        //echo "<pre>"; print_r(Auth::guard('admin')->user()); die;
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('backend.admin-profile.profile')->with(compact('adminDetails'));
    }

    public function checkCurrentPassword(Request $request) {
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        //echo Auth::guard('admin')->user()->password(); die;
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    ## update admin password
    public function updateCheckPassword(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data);
            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                //check if new password and reconfirm password are the same
                if ($data['new_password'] == $data['confirm_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    Session::flash('success_message', 'Passwordi u azhornua me sukses!');
                } else {
                    Session::flash('error_message', 'Passwordi i ri  dhe Passwordi i konfirmuar nuk jane te njejte!');
                }

            } else {
                Session::flash('error_message', 'Passwordi eshte i gabuar!');
            }
            return redirect()->back();
        }
    }

    public function storeAdmin(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'role_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $notification = ['message' => 'User-i nuk mund te krijohet: '.$validator->messages()->first(), 'alert-type' => 'error'];
            return redirect()->back()->withInput()->with($notification);
        }

        $name = $request->input("name");
        $email = $request->input("email");
        $roleId = (int) $request->input("role_id");
        $password = $request->input("password");

        $role = Role::findOrFail($roleId);

        Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role_id' => $role->id,
        ]);

        $notification = array('message' => 'User-i u krijua me sukses!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function updateAdmin(Request $request, $id) {
        $updateAdmin = Admin::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$updateAdmin->id,
            'role_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $notification = ['message' => 'User-i nuk mund te modifikohet: '.$validator->messages()->first(), 'alert-type' => 'error'];
            return redirect()->back()->withInput()->with($notification);
        }

        $name = $request->input("name");
        $email = $request->input("email");
        $roleId = (int) $request->input("role_id");

        $role = Role::findOrFail($roleId);

        $updateAdmin->update(['name' => $name, 'email' => $email, 'role_id' => $role->id]);

        $notification = array('message' => 'User-i u modifikua me sukses!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function deleteAdmin($id) {
        $admin = Auth::guard('admin')->user();

        if ($admin->id === $id) {
            $notification = ['message' => 'Ju nuk mund te fshini vetveten!', 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }

        $deleteAdmin = Admin::findOrFail($id);

        $done = $deleteAdmin->delete();

        if (!$done) {
            $notification = ['message' => 'Pati nje problem ne fshirjen e user-it!', 'alert-type' => 'error'];
        } else {
            $notification = array('message' => 'User-i u fshi me sukses!', 'alert-type' => 'success');
        }

        return redirect()->route('app.admins.index')->with($notification);
    }
}
