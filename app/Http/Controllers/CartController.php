<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    public function add(Request $request, $id)
{
    $product = Product::findOrFail($id);

    if ($product->stock <= 0) {
        return redirect('/menu')
            ->with('error', 'Энэ бүтээгдэхүүний үлдэгдэл дууссан байна.');
    }

    $quantity = (int) $request->input('quantity', 1);

    if ($quantity < 1) {
        $quantity = 1;
    }

    if ($quantity > $product->stock) {
        return redirect('/menu')
            ->with('error', 'Үлдэгдлээс их хэмжээгээр нэмэх боломжгүй.');
    }

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {

        $newQuantity = $cart[$id]['quantity'] + $quantity;

        if ($newQuantity > $product->stock) {
            return redirect('/cart')
                ->with('error', 'Үлдэгдлээс их хэмжээгээр нэмэх боломжгүй.');
        }

        $cart[$id]['quantity'] = $newQuantity;

    } else {

        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => $quantity,
        ];
    }

    session()->put('cart', $cart);

    return redirect('/cart');
}

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect('/cart');
    }

    public function updateQuantity($id, $type)
{
    $cart = session()->get('cart', []);

    if (!isset($cart[$id])) {
        return redirect('/cart');
    }

    $product = Product::find($id);

    if (!$product) {
        return redirect('/cart');
    }

    if ($type == 'plus') {

        if ($cart[$id]['quantity'] < $product->stock) {
            $cart[$id]['quantity']++;
        }

    } elseif ($type == 'minus') {

        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        }
    }

    session()->put('cart', $cart);

    return redirect('/cart');
}
}