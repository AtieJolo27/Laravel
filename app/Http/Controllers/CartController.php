<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\CartItem;
use App\Models\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
public function addtocart($id, Request $request)
{
        \Log::info('addtocart called', ['id' => $id, 'selections_id' => $request->selections_id]);

    $product = Products::findOrFail($id);
    $selections_id = $request->selections_id;

    // Fetch the selection model if an ID is provided
    $selection = $selections_id ? \App\Models\Selections::findOrFail($selections_id) : null;

    // Set price to price_adjustment if selection exists, otherwise default to 0
    $finalPrice = $selection ? $selection->price_adjustment : 0;

    // Find or create active cart for user
    $cart = Cart::firstOrCreate([
        'user_id' => auth()->id(),
    ]);
    \Log::info('Cart Used', ['id' => $cart->cart_id]);

    // Find if cart item already exists (same cart + product + selection)
    $cart_item = CartItem::where('cart_id', $cart->cart_id)
        ->where('product_id', $id)
        ->where('selections_id', $selections_id)
        ->first();

    if ($cart_item) {
        $cart_item->increment('quantity');
        $quantity = $cart_item->quantity;
    } else {
        $cart_item = CartItem::create([
            'cart_id'       => $cart->cart_id,
            'product_id'    => $product->id,
            'selections_id' => $selections_id,
            'quantity'      => 1,
            'price'         => $finalPrice, // use computed price!
        ]);
        $quantity = 1;
    }

    // Return all items in this cart along with their product and selection relationships
    $cartItems = $cart->items()->with('product', 'selections')->get();

    return response()->json([
        'success'  => 'Product added to cart!',
        'cartHTML' => view('partials.cart-items', compact('cartItems'))->render(),
    ]);
}

public function decreaseCartQuantity($cartItemId, Request $request)
{
    $cartItem = CartItem::find($cartItemId);
    \Log::info('CartItem to increment:', $cartItem ? $cartItem->toArray() : []);
    \Log::info('Related Cart:', $cartItem && $cartItem->cart ? $cartItem->cart->toArray() : []);

    // Check if the cart item exists and belongs to the logged-in user
    if ($cartItem && $cartItem->cart->user_id == auth()->id()) {
        $cartItem->decrement('quantity');
        $cartItem->refresh();
        $cartItem->selections->decrement('stock' );
        // Optionally: $totalAdjustment = $cartItem->selections->price_adjustment * $cartItem->quantity;
    }

    // Re-fetch the user's cart and updated items for rendering
    $cart = Cart::where('user_id', auth()->id())->first();
    $cartItems = $cart ? $cart->items()->with('product')->get() : collect();

    return response()->json([
        'cartHTML' => view('partials.cart-items', compact('cartItems'))->render(),
    ]);
}


   //Adding Quantity 
public function addCartQuantity($cartItemId, Request $request)
{
    $cartItem = CartItem::find($cartItemId);
    \Log::info('CartItem to increment:', $cartItem ? $cartItem->toArray() : []);
    \Log::info('Related Cart:', $cartItem && $cartItem->cart ? $cartItem->cart->toArray() : []);

    // Check if the cart item exists and belongs to the logged-in user
    if ($cartItem && $cartItem->cart->user_id == auth()->id()) {
        $cartItem->increment('quantity');
        $cartItem->refresh();
        $cartItem->selections->increment('stock');
        // Optionally: $totalAdjustment = $cartItem->selections->price_adjustment * $cartItem->quantity;
    }

    // Re-fetch the user's cart and updated items for rendering
    $cart = Cart::where('user_id', auth()->id())->first();
    $cartItems = $cart ? $cart->items()->with('product')->get() : collect();

    return response()->json([
        'cartHTML' => view('partials.cart-items', compact('cartItems'))->render(),
    ]);
}

public function removeFromCart($cartItemId, Request $request)
{
    $cartItem = CartItem::find($cartItemId);
    \Log::info('CartItem:', $cartItem ? $cartItem->toArray() : []);
\Log::info('Related Cart:', $cartItem && $cartItem->cart ? $cartItem->cart->toArray() : []);

    if ($cartItem && $cartItem->cart->user_id == auth()->id()) {
        $cartItem->selections->increment('stock', $cartItem->quantity);
        $cartItem->delete();
    }

    $cart = Cart::where('user_id', auth()->id())->first();
    $cartItems = $cart ? $cart->items()->with('product')->get() : collect();
    

    return response()->json([
        'cartHTML' => view('partials.cart-items', compact('cartItems'))->render(),
    ]);
}



public function total()
{
    $cart = Cart::where('user_id', auth()->id())->first();

    $cartItems = $cart
        ? CartItem::where('cart_id', $cart->cart_id)
            ->with(['selections']) // eager load selection instead of product
            ->get()
        : collect();

    $subTotal = $cartItems->sum(function ($item) {
        // Check that the selection exists to avoid errors
        return $item->selections
            ? $item->quantity * $item->selections->price_adjustment
            : 0;
    });

    $deliveryFee = 50;
    $total = $subTotal + $deliveryFee;

    return response()->json([
        'totalHTML' => view('partials.subTotal', compact('subTotal', 'total', 'deliveryFee'))->render()
    ]);
}


 
   public function showToCart()
{
    $cart = Cart::where(
        'user_id', auth()->id())->first();
    $cartItems = CartItem::where(
        'cart_id',  $cart->cart_id,
    )->get();





    $subTotal = $cartItems->sum(fn($item) =>
        $item->quantity * $item->product->productPrice
    );
    $deliveryFee = 50;
    $total = $subTotal + $deliveryFee; 

    return view('cart', compact('cartItems','subTotal', 'deliveryFee', 'total' ));
}

}
