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
        $products = Products::all();
        return view('home', compact('products'));
    }

    public function ShowClicked($id){

        $product = Products::findOrFail($id);

        return response()->json([
            'productName' => $product->productName,
            'productDescription' => $product->productDescription,
            'productPrice' => $product->productPrice,
            'productImage' => asset('storage/' . $product->productImage)
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
