<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.orders.index');
        $order_statuses = OrderStatus::get();
        return view('backend.orders.order-statuses', compact('order_statuses'));
    }

    public function store(Request $request)
    {
        $request->user('admin')->authorizePermission('app.orders.index');
        $request->validate(['name' => 'required|unique:order_statuses,name|max:100']);
        OrderStatus::create(['name' => $request->name]);
        $notification = array(
            'message' => 'Statusi i porosise u krijua me sukses!',
            'alert-type' => 'success'
        );
        return redirect()->route('app.order-statuses.index')->with($notification);
    }

    public function update(Request $request, OrderStatus $orderStatus)
    {
        $request->validate(['name' => 'required|unique:order_statuses,name|max:100']);
        $orderStatus->update(['name' => $request->name]);
        $notification = array(
            'message' => 'Statusi i porosise u azhornua me sukses!',
            'alert-type' => 'success'
        );
        return redirect()->route('app.order-statuses.index')->with($notification);
    }

    public function destroy(Request $request, OrderStatus $orderStatus)
    {
        $request->user('admin')->authorizePermission('app.orders.index');
        $orderStatus->delete();
        $notification = array(
            'message' => 'Statusi i porosise u fshi me sukses!',
            'alert-type' => 'success'
        );
        return redirect()->route('app.order-statuses.index')->with($notification);
    }

    // Update orderStatus Status
    public function updateOrderSStatus(Request $request)
    {
        $request->user('admin')->authorizePermission('app.orders.index');
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            OrderStatus::where('id', $data['orderStatus_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'orderStatus_id' => $data['orderStatus_id']]);
        }
    }
}
