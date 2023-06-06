<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;  
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::find($productId);

        Cart::create([
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}
