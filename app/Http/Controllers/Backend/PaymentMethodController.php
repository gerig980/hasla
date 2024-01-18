<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        $request->user('admin')->authorizePermission('app.payment-methods.index');
        $payment_methods = PaymentMethod::get();
        return view('backend.payment-methods.index', compact('payment_methods'));
    }
}
