<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Login
|--------------------------------------------------------------------------
*/
Route::get('/test', function () {
    return 'TEST OK';
});

Route::get('/db-test', function () {
    return \App\Models\Product::count();
});

Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        Auth::logout();

        return back()->withErrors([
            'email' => 'Admin эрхгүй хэрэглэгч байна.',
        ]);
    }

    return back()->withErrors([
        'email' => 'Email эсвэл password буруу байна.',
    ]);

});

/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/

Route::get('/', [ProductController::class, 'home']);

Route::get('/menu', [ProductController::class, 'menu']);

Route::get('/custom-cakes', [ProductController::class, 'customCakes']);

Route::get('/product/{id}', [ProductController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index']);

Route::post('/cart/add/{id}', [CartController::class, 'add']);

Route::get('/cart/remove/{id}', [CartController::class, 'remove']);

Route::get('/cart/clear', [CartController::class, 'clear']);

Route::get('/cart/update/{id}/{type}', [CartController::class, 'updateQuantity']);

Route::post('/buy-now/{id}', function ($id, Illuminate\Http\Request $request) {

    $product = \App\Models\Product::findOrFail($id);

    $cart = session()->get('cart', []);

    $cart[$id] = [
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'image' => $product->image,
        'quantity' => $request->quantity ?? 1,
    ];

    session()->put('cart', $cart);

    return redirect('/checkout');

});

/*
|--------------------------------------------------------------------------
| Payment
|--------------------------------------------------------------------------
*/

Route::post('/payment', [OrderController::class, 'payment']);

Route::post('/payment/confirm', [OrderController::class, 'confirmPayment']);

Route::get('/receipt/{id}', [OrderController::class, 'receipt']);

/*
|--------------------------------------------------------------------------
| Orders
|--------------------------------------------------------------------------
*/

Route::get('/checkout', [OrderController::class, 'checkout']);

Route::post('/checkout/store', [OrderController::class, 'store']);

Route::get('/orders', [OrderController::class, 'customerOrders']);

Route::post('/orders/search', [OrderController::class, 'searchOrder']);

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

    Route::get('/admin/products', [AdminController::class, 'products']);

    Route::get('/admin/products/create', [AdminController::class, 'create']);

    Route::post('/admin/products/store', [AdminController::class, 'store']);

    Route::get('/admin/products/{id}/edit', [AdminController::class, 'edit']);

    Route::post('/admin/products/{id}/update', [AdminController::class, 'update']);

    Route::get('/admin/products/{id}/delete', [AdminController::class, 'delete']);

    Route::get('/admin/orders', [AdminController::class, 'orders']);

    Route::get('/admin/completed-orders', [AdminController::class, 'completedOrders']);

    Route::post('/admin/orders/{id}/status', [AdminController::class, 'updateOrderStatus']);

    Route::get('/admin/orders-count', function () {
        return response()->json([
            'count' => \App\Models\Order::count()
        ]);
    });
Route::get('/admin/gift-packages', [AdminController::class, 'giftPackages']);

Route::get('/admin/gift-packages/create', [AdminController::class, 'createGiftPackage']);

Route::post('/admin/gift-packages/store', [AdminController::class, 'storeGiftPackage']);

Route::get('/admin/gift-packages/{id}/delete', [AdminController::class, 'deleteGiftPackage']);

Route::get('/admin/custom-cakes', [AdminController::class, 'customCakes']);

Route::get('/admin/custom-cakes/create', [AdminController::class, 'createCustomCake']);

Route::post('/admin/custom-cakes/store', [AdminController::class, 'storeCustomCake']);

Route::get('/admin/custom-cakes/{id}/delete', [AdminController::class, 'deleteCustomCake']);
});

/*
|--------------------------------------------------------------------------
| Breeze Dashboard Redirect
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/');

})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/create-admin', function () {

    $user = \App\Models\User::where('email', 'admin@gmail.com')->first();

    if (!$user) {

        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
    }

    $user->password = bcrypt('admin12345');
    $user->role = 'admin';

    $user->save();

    return 'ADMIN CREATED';
});

require __DIR__.'/auth.php';