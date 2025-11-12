<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productName'=>'required',
            'productDescription'=>'required',
            'productCategory'=>'required',
            'productPrice'=>'required|numeric|min:1',
            'productImage'=>'required'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Products::with('selections')->get();

        return view('meals', compact('products'));
    }

    public function ShowClicked($id){

        $product = Products::with('selections')->findOrFail($id);

        return response()->json([
            'productName' => $product->productName,
            'productDescription' => $product->productDescription,
            'productPrice' => $product->productPrice,
            'productImage' => asset('storage/' . $product->productImage),
            'selections' =>$product->selections,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
