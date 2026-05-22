<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\GiftPackage;
use App\Models\CustomCake;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $featured = Product::where('featured', 1)
            ->latest()
            ->take(8)
            ->get();

        $products = Product::latest()
            ->take(12)
            ->get();

        $giftPackages = GiftPackage::where('is_active', true)
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact(
            'featured',
            'products',
            'giftPackages'
        ));
    }

    public function menu(Request $request)
    {
        $query = Product::query();

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->get();

        return view('menu', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product-detail', compact('product'));
    }

    public function customCakes()
    {
        $customCakes = CustomCake::where('is_active', true)
            ->latest()
            ->get();

        return view('custom-cakes', compact('customCakes'));
    }
}