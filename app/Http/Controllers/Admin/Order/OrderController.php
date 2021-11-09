<?php

namespace App\Http\Controllers\admin\Order;

use App\Customer;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use auth;
use App\User;
use App\OrderItem;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('items')->where('vendor_id',Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function view(Request $request,$id)
    {
        $order = Order::with('items', 'employee')->find($id);
        $employees = Employee::get();
        return view('admin.order.view', compact('order','employees'));
    }

    public function create()
    {
        $employees = Employee::get();
        $customers = Customer::get();
        $products = Product::get();
        return view('admin.order.create', compact('employees','customers','products'));
    }

    public function updateStatus($id) {
        $request = request()->all();
        Order::find($id)->update([
            $request['name'] => $request['val']
        ]);
        return response()->json(['status' => 'success'], 200);
    }

    public function store(Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'employee_id' => 'required',
            'customer_id' => 'required',
            'address' => 'required',
            'product_id' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $vat = 5;
        $user = User::find(Auth::user()->id);
        $sum = 0;

        foreach ($request->products as $key => $value) {
            $product = Product::find($value['product_id']);
                if ($product) {
                    $sum += $product->price * $value['qty'];
                }
            }


        $sub_total = $sum;

        $order = new Order();
        $order->vendor_id = $user_id;
        $order->order_date = $request->order_date;
        $order->employee_id = $request->employee_id;
        $order->customer_id = $request->customer_id;
        $order->order_type = $request->order_type;
        $order->address = $request->address;
        $order->location = $request->location;
        $order->lat = $request->lat;
        $order->lng = $request->lng;
        $order->status = 'Pending';
        $order->sub_total = $sub_total;
        $order->vat = $vat;
        $order->grand_total = $sub_total + $vat;
        $order->paid_amount = $sub_total + $vat;
        $order->save();

        $add_order_item = [];

        foreach ($request->products as $key => $value) {
            $product = Product::find($value['product_id']);
                if ($product) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $value['product_id'];
                    $orderItem->qty = $value['qty'];
                    $orderItem->price = $product->price;
                    $orderItem->total = $product->price * $value['qty'];
                    $orderItem->save();

                    $add_order_item[] = $orderItem;
                }
            }

        return redirect()->route('order.index');
    }
}
