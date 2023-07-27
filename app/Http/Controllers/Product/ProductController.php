<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Exception;

class ProductController extends Controller
{
   public $product;
   public $category;


    public function __construct(ProductRepository $productRepository,CategoryRepository $categoryRepository) {

      $this->product = $productRepository;
      $this->category = $categoryRepository;
   }
   public function index(){

      try {
         $products =$this->product->all();
        
        return response()->json($products);

      } catch (Exception $ex) {
         
         return response()->json([
            "ERROR ProductController.index : ".$ex->getMessage()
         ]);
      }
        
   }
   public function categories(){

     
        try {

         $categories =$this->category->all();

         return response()->json($categories);

      } catch (Exception $ex) {
         
         return response()->json([
            "ERROR ProductController.categories : ".$ex->getMessage()
         ]);
      }
   }
   public function edit ($id){
      
      try {

         $product  = $this->product->getById($id);

         return response()->json($product);

      } catch (Exception $ex) {
         
         return response()->json([
            "ERROR ProductController.edit : ".$ex->getMessage()
         ]);
      }
     

   }
   public function store(Request $request){

      try {

         $products = $this->product->store($request->all());
         
         return response()->json($products);

      } catch (Exception $ex) {

         return response()->json([
            "ERROR ProductController.store : ".$ex->getMessage()
         ]);
      }
        
   }
   public function update(Request $params,$id){

      try {

         $products = $this->product->update($params,$id);

         return response()->json($products);

      } catch (Exception $ex) {

         return response()->json([
            "ERROR ProductController.update : ".$ex->getMessage()
         ]);
      }
        
   }
   public function delete(Request $request){

      try {

         $this->product->delete($request->id);
  
        } catch (Exception $ex) {
  
           return response()->json([
              "ERROR ProductController.delete : ".$ex->getMessage()
           ]);
        }

   }

}
