<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        return view('products');
    }

    public function addProduct(Request $request){
        $request->validate(
            [
            'name'=>'required|unique:products',
            'price'=>'required',
            'quantity'=>'required'
            ],
            [
                'name.required'=>'Name is required',
                'name.unique'=>'Already exist',
                'price.required'=>'Price is required',
                'quantity.required'=>'Quantity is required',
            ]
        );
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
