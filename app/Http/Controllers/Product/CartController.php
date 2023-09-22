<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        try {
       
        $carts = Cart::with('products')->latest()->get();
        return response()->json($carts);
    } catch (\Exception $ex) {
        return response()->json([
            "ERROR CartController.getCart : ".$ex->getMessage()
         ]);
    }
    }

    public function addToCart(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
            ]);
    
            $cartItem = Cart::create([
                'product_id' => $validatedData['product_id'],
                'quantity' => $validatedData['quantity'],
            ]);
    
            return response()->json(['message' => 'Item added to cart', 'item' => $cartItem]);
        }catch (\Exception $ex) {
            return response()->json([
                "ERROR CartController.addToCart : ".$ex->getMessage()
             ]);
        }
       
    }
    public function getProductCart($id){

        try {
  
          $product = Cart::find($id);

         return response()->json( $product);
          } catch (Exception $ex) {
    
             return response()->json([
                "ERRORCartController.getProductCart : ".$ex->getMessage()
             ]);
          }
  
     }
    public function delete(Request $request){

        try {
  
          $product = Cart::find($request->id);

          $product->delete();
          } catch (Exception $ex) {
    
             return response()->json([
                "ERRORCartController.delete : ".$ex->getMessage()
             ]);
          }
  
     }
}
