<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orders()
    {
        $payments = Payments::where('user_id', Auth::id())->with('product')->get();
        return view('order.index', compact('payments'));
    }

    public function destroy($id)
    {
        $payment = Payments::findOrFail($id);
        $payment->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
