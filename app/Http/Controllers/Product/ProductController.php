<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
   public function index(){

        $products = Product::latest()->with("categories")->get();

        return response()->json($products);
   }
}
