<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        $products = Product::latest()->paginate(5);
        return view('products', compact('products'));

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

    //Update Product Function
        public function updateProduct(Request $request){
        $request->validate(
            [
            'update_name'=>'required|unique:products,name,'.$request->product_id,
            'update_price'=>'required',
            'update_quantity'=>'required'
            ],
            [
                'update_name.required'=>'Name is required',
                'update_name.unique'=>'Already exist',
                'update_price.required'=>'Price is required',
                'update_quantity.required'=>'Quantity is required',
            ]
        );

        Product::where('id', $request->product_id)->update([
            'name'=>$request->update_name,
            'price'=>$request->update_price,
            'quantity'=>$request->update_quantity,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }
}
