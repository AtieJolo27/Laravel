<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   public function addtocart($id, Request $request){

    $product = Products::find($id);
    $cart_item = CartItem::where('user_id', auth()->id())
    ->where('product_id', $id)
    ->first();

    if($cart_item){
        $cart_item->increment('quantity');
    }
    else{
        CartItem::create([
            'user_id'=> auth()->id(),
            'product_id'=>$product->id,
            'quantity'=>1,
        ]);     
    }
     $cartItems = CartItem::with('product')
    ->where('user_id', auth()->id())
    ->get();
     $totalQuantity = $cartItems->countBy('quantity');

    return response()->json([
        'success' => 'Product added to cart!',
        'cartCount' => $totalQuantity,
        'cartHTML' => view('partials.cart-items', compact('cartItems'))->render(),
    ]);
   }

   public function decreaseCartQuantity($id, Request $request){
    $product = Products::findOrFail($id);
    $cartItem = CartItem::where('user_id', auth()->id())
    ->where('product_id', $id)
    ->first();
    if($cartItem){
        $cartItem->decrement('quantity');
        $cartItem->product->increment('productStock');
        $cartItem->refresh();
        if($cartItem->quantity <=0){
            $cartItem->refresh();
            $cartItem->delete();

    }
    }
    $cartItems = CartItem::with('product')
    ->where('user_id',auth()->id())
    ->get();

    return response()->json([
        'cartHTML' => view('partials.cart-items', compact('cartItems'))->render(),
    ]);
   }

   //Adding Quantity 
public function addCartQuantity($id, Request $request){
    $product = Products::findOrFail($id);
    $cartItem = CartItem::where('user_id', auth()->id())
    ->where('product_id', $id)
    ->first();

    if($cartItem && $product->productStock > 0){
        $cartItem->increment('quantity');
        $cartItem->product->decrement('productStock');
        $cartItem->refresh();
    }
    $cartItems = CartItem::with('product')
    ->where('user_id', auth()->id())
    ->get();
    return response()->json([
        'cartHTML' => view('partials.cart-items', compact('cartItems'))->render(),
    ]);
}
public function removeFromCart($id, Request $request){
    $product = Products::findOrFail($id);
    $cartItem = CartItem::where('user_id', auth()->id())
    ->where('product_id', $id)
    ->first();

    if($cartItem){
        $cartItem->product->productStock += $cartItem->quantity;
        $cartItem->product->save();
        $cartItem->delete();
    }
    $cartItems = CartItem::with('product')
    ->where('user_id', auth()->id())
    ->get();
    return response()->json([
        'cartHTML' => view('partials.cart-items', compact('cartItems'))->render(),
    ]);
}

    public function total(){
         $cartItems = CartItem::with('product')
    ->where('user_id', auth()->id())
    ->get();
    $subTotal = 0;
    foreach($cartItems as $items){
        $subTotal += $items->quantity * $items->product->productPrice;
    }
    $total = $subTotal;
    $deliveryFee = 50;
    return response()->json( [  
        'totalHTML' => view('partials.subTotal', compact('subTotal', 'total', 'deliveryFee'))->render()
    ]);
    }
 
   public function showToCart(){
    $cartItems = CartItem::with('product')
        ->where('user_id', auth()->id())
        ->get();

    $subTotal = 0;
    foreach($cartItems as $items){
        $subTotal += $items->quantity * $items->product->productPrice;
    }
    $deliveryFee = 50; 
    $total = $subTotal + $deliveryFee;

    return view('cart', compact('cartItems', 'subTotal', 'deliveryFee', 'total'));
}

}
