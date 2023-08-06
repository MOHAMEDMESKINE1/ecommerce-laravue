<?php

namespace App\Http\Controllers\Category;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public $category ; 

    public  function __construct(CategoryRepository $categoryRepository) {

        $this->category = $categoryRepository;
    }

    public function index(){
        try {
            $categories =$this->category->all();
           
           return response()->json($categories);
   
         } catch (Exception $ex) {
            
            return response()->json([
               "ERROR CategoryController.index : ".$ex->getMessage()
            ]);
         }
    }
    public function edit($id){
        try {

            $category  = $this->category->getById($id);
   
            return response()->json($category);
   
         } catch (Exception $ex) {
            
            return response()->json([
               "ERROR CategoryController.edit : ".$ex->getMessage()
            ]);
         }
    }
    public function update(Request $params,$id){

        try {
  
           $categories = $this->category->update($params,$id);
  
           return response()->json($categories);
  
        } catch (Exception $ex) {
  
           return response()->json([
              "ERROR CategoryController.update : ".$ex->getMessage()
           ]);
        }
          
     }
    public function store(Request $request){
        try {
           
            $categories =$this->category->store($request->all());
           
           return response()->json($categories);
   
         } catch (Exception $ex) {
            
            return response()->json([
               "ERROR CategoryController.store : ".$ex->getMessage()
            ]);
         }
    }
    
    public function delete(Request $request){

        try {
          $this->category->delete($request->id);
           
   
         } catch (Exception $ex) {
            
            return response()->json([
               "ERROR CategoryController.delete : ".$ex->getMessage()
            ]);
         }
    }
}
