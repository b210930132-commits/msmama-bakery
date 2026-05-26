<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\GiftPackage;
use App\Models\CustomCake;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $totalSales = Order::sum('total_price');
        $pendingOrders = Order::where('status', 'Pending')->count();
        $todaySales = Order::whereDate('created_at', today())->sum('total_price');

        $monthlySales = Order::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');

        $recentOrders = Order::latest()->take(5)->get();

        $dailySales = Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->take(7)
            ->get();

        $topProducts = OrderItem::selectRaw('product_id, SUM(quantity) as total_quantity')
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'productCount',
            'orderCount',
            'totalSales',
            'pendingOrders',
            'todaySales',
            'monthlySales',
            'recentOrders',
            'dailySales',
            'topProducts'
        ));
    }

    public function products(Request $request)
    {
        $query = Product::withSum('orderItems as total_sold', 'quantity');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->stock_status == 'out') {
            $query->where('stock', '<=', 0);
        }

        if ($request->stock_status == 'low') {
            $query->where('stock', '>', 0)
                ->where('stock', '<=', 5);
        }

        if ($request->stock_status == 'available') {
            $query->where('stock', '>', 5);
        }

        $products = $query->latest()->get();

        return view('admin.products', compact('products'));
    }

    public function create()
    {
        return view('admin.create-product');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'image' => 'nullable|string',
        ]);

        Product::create($data);

        return redirect('/admin/products');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.edit-product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'image' => 'nullable|string',
        ]);

        $product->update($data);

        return redirect('/admin/products');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/products');
    }

    public function orders(Request $request)
    {
        $query = Order::with('items.product')
            ->whereNotIn('status', ['Delivered', 'Cancelled']);

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('customer_name', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->pickup_date) {
            $query->whereDate('pickup_date', $request->pickup_date);
        }

        $orders = $query
            ->orderBy('pickup_date', 'asc')
            ->orderBy('pickup_time', 'asc')
            ->get();

        return view('admin.orders', compact('orders'));
    }

    public function completedOrders(Request $request)
    {
        $query = Order::with('items.product')
            ->whereIn('status', ['Delivered', 'Cancelled']);

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('customer_name', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->pickup_date) {
            $query->whereDate('pickup_date', $request->pickup_date);
        }

        $orders = $query->latest()->get();

        return view('admin.completed-orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect('/admin/orders');
    }

    public function giftPackages()
    {
        $giftPackages = GiftPackage::latest()->get();

        return view('admin.gift-packages', compact('giftPackages'));
    }

    public function createGiftPackage()
    {
        return view('admin.create-gift-package');
    }

    public function storeGiftPackage(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'label' => 'nullable',
            'description' => 'nullable',
            'price' => 'required',
            'image' => 'nullable|string',
            'is_active' => 'nullable',
        ]);

        $data['is_active'] = $request->has('is_active');

        GiftPackage::create($data);

        return redirect('/admin/gift-packages');
    }

    public function deleteGiftPackage($id)
    {
        $giftPackage = GiftPackage::findOrFail($id);
        $giftPackage->delete();

        return redirect('/admin/gift-packages');
    }

    public function customCakes()
    {
        $customCakes = CustomCake::latest()->get();

        return view('admin.custom-cakes', compact('customCakes'));
    }

    public function createCustomCake()
    {
        return view('admin.create-custom-cake');
    }

    public function storeCustomCake(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'label' => 'nullable',
            'description' => 'nullable',
            'price' => 'required',
            'image' => 'nullable|string',
            'is_active' => 'nullable',
        ]);

        $data['is_active'] = $request->has('is_active');

        CustomCake::create($data);

        return redirect('/admin/custom-cakes');
    }

    public function deleteCustomCake($id)
    {
        $customCake = CustomCake::findOrFail($id);
        $customCake->delete();

        return redirect('/admin/custom-cakes');
    }
}