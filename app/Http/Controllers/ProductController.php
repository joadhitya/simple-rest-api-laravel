<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function get(){
        $data = Product::get();
        return response()->json(
            [
                "message" => "Success",
                "data" => $data
            ]
        );
    }

    function getById($id){
        $data = Product::findOrFail($id);
        return response()->json(
            [
                "message" => "Success",
                "data" => $data
            ]
        );
    }
    function post(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->active = $request->active;
        $product->description = $request->description;

        $product->save();

        return response()->json(
            [
                "message" => "Success",
                "data" => $product
            ]
        );
    }

    function put($id, Request $request){
        $product = Product::where('id', $id)->first();
        if($product){
            $product->name = $request->name ? $request->name : $product->name;
            $product->price = $request->price ? $request->price : $product->price;
            $product->quantity = $request->quantity ? $request->quantity : $product->quantity;
            $product->active = $request->active ? $request->active : $product->active;
            $product->description = $request->description ? $request->description : $product->description;
            $product->save();
            return response()->json(
                [
                    "message" => "Success",
                    "data" => $product
                ]
            );
        }else{
            return response()->json(
                [
                    "message" => "Failed"
                ]
            );
        }
       
    }
    function delete($id){
        $product = Product::where('id', $id)->first();
        if($product){
            $product->delete();
            return response()->json(
                [
                    "message" => "Success"
                ]
            );
        }else{
            return response()->json(
                [
                    "message" => "Failed"
                ],400
            );
        }        
    }
}
