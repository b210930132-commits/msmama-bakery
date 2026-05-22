<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect('/cart');
        }

        return view('checkout', compact('cart'));
    }

    public function payment(Request $request)
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect('/cart');
        }

        $request->validate([
    'customer_name' => 'required',
    'phone' => 'required',
    'address' => 'required',
    'pickup_date' => 'required|date|after_or_equal:today',
    'pickup_time' => 'required',
]);

$time = $request->pickup_time;

if ($time < '09:00' || $time > '19:00') {

    return back()->with('error',
        'Захиалга зөвхөн 09:00 - 19:00 цагийн хооронд авна.'
    );
}

        session()->put('checkout_data', $request->all());

        return view('payment', compact('cart'));
    }

    public function confirmPayment()
    {
        $checkoutData = session()->get('checkout_data');
        $cart = session()->get('cart', []);

        if (!$checkoutData || count($cart) == 0) {
            return redirect('/cart');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'customer_name' => $checkoutData['customer_name'],
            'phone' => $checkoutData['phone'],
            'address' => $checkoutData['address'],
            'pickup_date' => $checkoutData['pickup_date'] ?? null,
            'pickup_time' => $checkoutData['pickup_time'] ?? null,
            'note' => $checkoutData['note'] ?? null,
            'total_price' => $total,
            'status' => 'Pending',
        ]);

        foreach ($cart as $item) {
    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $item['id'],
        'quantity' => $item['quantity'],
        'price' => $item['price'],
    ]);

    $product = \App\Models\Product::find($item['id']);

    if ($product) {
        $product->stock = max(0, $product->stock - $item['quantity']);
        $product->save();
    }
}

        session()->forget('cart');
        session()->forget('checkout_data');

        $orderIds = session()->get('order_ids', []);
        $orderIds[] = $order->id;
        session()->put('order_ids', $orderIds);

        return redirect('/receipt/' . $order->id);
    }

    public function store(Request $request)
    {
        return $this->payment($request);
    }

    public function customerOrders()
    {
        $orderIds = session()->get('order_ids', []);

        $orders = Order::whereIn('id', $orderIds)
            ->orderBy('pickup_date', 'asc')
            ->orderBy('pickup_time', 'asc')
            ->get();

        return view('orders', compact('orders'));
    }

    public function searchOrder(Request $request)
    {
        $orders = Order::where('phone', $request->phone)
            ->orderBy('pickup_date', 'asc')
            ->orderBy('pickup_time', 'asc')
            ->get();

        return view('orders', compact('orders'));
    }

    public function receipt($id)
{
    $order = Order::with('items.product')->findOrFail($id);

    return view('receipt', compact('order'));
}
}