<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PostDelivery;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportOrder;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller {
    private $orderRepo;

    public function __construct(OrderRepository $orderRepo) {
        $this->orderRepo = $orderRepo;
    }

    public function index(Request $request) {
        $request->user('admin')->authorizePermission('app.orders.index');
//        $request->user('admin')->authorizePermission('app.orders.index');
        $orders = Order::orderBy('created_at', 'desc')->lazy();
        return view('backend.orders.index', compact('orders'));
    }

    public function showOrder(Request $request, $id) {
        $request->user('admin')->authorizePermission('app.orders.index');
        $order = Order::findOrFail($id);
        $orderStatuses = OrderStatus::where('status', 1)->get();
        $orderStatusesUpdated = OrderStatus::where('id', 3)->orWhere('id', 6)->get();

        $posts = PostDelivery::where('status', 1)->get();
        return view('backend.orders.show-order', compact('order', 'orderStatuses', 'posts', 'orderStatusesUpdated'));
    }

    public function invoiceOrder(Request $request, $orderCode) {
        $request->user('admin')->authorizePermission('app.orders.index');
        $order = Order::where('order_code', $orderCode)->first();
        return view('backend.orders.invoice', compact('order'));
    }

    public function preInvoiceOrder(Request $request, $orderCode) {
        $request->user('admin')->authorizePermission('app.orders.index');
        $order = Order::where('order_code', $orderCode)->first();
        return view('backend.orders.pre-invoice', compact('order'));
    }

    public function deliverOrder(Request $request, $id) {
        $request->user('admin')->authorizePermission('app.orders.index');
        $adminId = Auth::guard('admin')->user()->id;

        $validator = Validator::make($request->all(), [
            'weight' => 'required|numeric',
            'pieces' => 'required|integer',
            'order_id' => 'required',
            'post_delivery_id' => 'required',
            'order_status_id' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = ['message' => 'Porosia nuk mund të dërgohet: '.$validator->messages()->first(), 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }

        $order = Order::find($id);

        if (!$order) {
            $notification = ['message' => 'Orderi nuk ekziston!', 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }

        $done = $order->update([
            'pieces' => $request->input('pieces'),
            'weight' => $request->input('weight'),
        ]);

        if (!$done) {
            $notification = ['message' => 'Dicka shkoi gabim. Provoni perseri.', 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }

        if (is_null($order->weight) || is_null($order->pieces)) {
            $notification = ['message' => 'Ju duhet te plotesoni peshen dhe numrin e pjeseve perpara se te dergoni porosine!', 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }

        $orderHistory = new OrderHistory();
        $orderHistory->admin_id = $adminId;
        $orderHistory->order_id = $request->order_id;
        $orderHistory->post_delivery_id = $request->post_delivery_id;
        $orderHistory->order_status_id = $request->order_status_id;
        $orderHistory->save();

        $previousStatus = $order->order_status_id;
        $order->update([
            'order_status_id'   =>  $request->order_status_id,
            'payment_gateaway'  =>  $request->post_delivery_id
        ]);
    

        $deliveredOrderId = $this->orderRepo->deliverOrder($orderHistory);

        // if (!$deliveredOrderId) {
        //     $order->update(['order_status_id' => $previousStatus]);
        //     $orderHistory->delete();
        //     $notification = ['message' => 'Pati nje problem ne dergimin e porosise!', 'alert-type' => 'error'];
        //} else {
            $notification = array('message' => 'Porosia u dergua me sukses!', 'alert-type' => 'success');
            $order->update(['deliver_order_id' => $deliveredOrderId]);
       // }

        return redirect()->route('app.orders.show', $request->order_id)->with($notification);
    }


    public function filterOrder(Request $request){
        $from = date($request->fromDate);
        $to = date($request->toDate);

        $orders = Order::where('order_code', '!=', '');
        if(!empty($request->search)) {
           $orders->where(('name'), 'LIKE', '%' . $request->search . '%')->orWhere(('order_code'), 'LIKE', '%' . $request->search. '%');
        }
        if(!empty($to) && !empty($from)){
            $orders->whereBetween('created_at', [$from, $to]);
        }
        if(!empty($request->orderStatus)){
            $orders->where(('order_status_id'), $request->orderStatus);
        }
        if(!empty($request->paymentStatus)) {
            $orders->where(('payment_status'), $request->paymentStatus);

        }
        if(!empty($request->paymentGateaway)) {
            $orders->where(('payment_gateaway'), $request->paymentGateaway);

        }
        $orders = $orders->get();

        if($orders){
            return view('backend.orders.index')->with(['orders' => $orders]);
        }
    }
    
    public function changeStatus(Request $request) {
        $request->user('admin')->authorizePermission('app.orders.index');
        $adminId = Auth::guard('admin')->user()->id;
        $order = Order::find($request->id);
        $orderHistory = new OrderHistory();
        $orderHistory->admin_id = $adminId;
        $orderHistory->order_id = $request->id;
        $orderHistory->post_delivery_id = $order->payment_gateaway;
        $orderHistory->order_status_id = $request->order_status_id;
        $orderHistory->save();

        $previousStatus = $order->order_status_id;
        $order->update([
            'order_status_id'   =>  $request->order_status_id
        ]);
        $notification = array('message' => 'Statusi i porosisë u ndryshua me sukses!', 'alert-type' => 'success');
        return redirect()->route('app.orders.show', $request->id)->with($notification);
    }

    
    public function exportOrders(Request $request){
        return Excel::download(new ExportOrder, 'orders.xlsx');
    }
}
