<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.customers.index');
        $customers = Customer::all();
        return view('backend.customers.index', compact('customers'));
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

    public function web(Request $request)
    {
        $request->user('admin')->authorizePermission('app.customers.index');
        $customers = User::where('role_id', 3)->get();
        return view('backend.customers.web', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.customers.create');
        $user_id = Auth::guard('admin')->user()->id;
        $formFields = $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);
        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'created_by' => $user_id
        ]);

        $notification = array(
            'message' => 'Klienti u shtua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // $request->user('admin')->authorizePermission('app.customers.show');
        $singleCustomer = Customer::where('id', $id)->first();
        $orders = Order::where('customer_id', $id)->get();
        $customerAddress = CustomerAddress::where('customer_id', $id)->get();
        return view('backend.customers.show-customer', compact('singleCustomer', 'orders', 'customerAddress'));
    }

    public function showweb(Request $request, $id)
    {
        // $request->user('admin')->authorizePermission('app.customers.show');
        $webCustomer = User::where('id', $id)->first();
        $orders = Order::where('user_id', $id)->get();
        $customerAddress = CustomerAddress::where('user_id', $id)->get();
        return view('backend.customers.web-customer', compact('webCustomer', 'orders', 'customerAddress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->user('admin')->authorizePermission('app.customers.edit');
        $formFields = $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        $customer->update($formFields);

        $notification = array(
            'message' => 'Klienti u azhornua me sukses!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    // update customer status
    public function statusChange(Request $request)
    {
        $request->user('admin')->authorizePermission('app.customers.edit');
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            User::where('id', $data['customer_id'])->update(['activated' => $status]);
            return response()->json(['status' => $status, 'customer_id' => $data['customer_id']]);
        }
    }
}
