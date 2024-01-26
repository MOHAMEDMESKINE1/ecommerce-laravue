<?php

namespace App\Http\Controllers\Product;

use Exception;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Product\ProductRequest;

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
   public function getDetails($id){
      try {
         
         $product =$this->product->getById($id);

         return  response()->json($product);

      } catch (Exception $ex) {
         
         return response()->json([
            "ERROR ProductController.getDetails : ".$ex->getMessage()
         ]);
      }


   }
   public function allProducts(){

      try {
         $products =$this->product->products();
        
        return response()->json($products);

      } catch (Exception $ex) {
         
         return response()->json([
            "ERROR ProductController.allProducts : ".$ex->getMessage()
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
   public function search (Request $request){
      
      try {

         $search_query =$request->input('query');

         $product  = $this->product->search($search_query);
         
        if($product){
         return response()->json($product);
           

        }else{
            $products =$this->product->all();
            
             return response()->json($products);

        }


      } catch (Exception $ex) {
         
         return response()->json([
            "ERROR ProductController.search : ".$ex->getMessage()
         ]);
      }
     

   }
   public function filter (Request $request){
      
      try {

         $filter_query =$request->input('filter_date');

         $product  = $this->product->filterByDate($filter_query);
         
        if($product){
         return response()->json($product);
           

        }else{
            $products =$this->product->all();
            
             return response()->json($products);

        }


      } catch (Exception $ex) {
         
         return response()->json([
            "ERROR ProductController.filter : ".$ex->getMessage()
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
  
   public function store(ProductRequest $request){

      try {
       
        
         $products = $this->product->store($request->all());
         
         return response()->json($products);

      } catch (Exception $ex) {

         return response()->json([
            "ERROR ProductController.store : ".$ex->getMessage()
         ]);
      }
        
   }
   public function update($id,Request $params){

      try {

         $products = $this->product->update($id,$params);

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
