<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    public function addToCart(Request $request, Product $product)
{
    $request->validate([
        'quantity' => 'required|integer|min=1',
    ]);

    $cartItem = CartItem::updateOrCreate(
        ['user_id' => auth()->id(), 'product_id' => $product->id],
        ['quantity' => DB::raw('quantity + ' . $request->quantity)]
    );

    return response()->json(['success' => true]);
}

}
