<?php

namespace App\Http\Controllers\NewsLetter;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LetterRepository;

class NewsLetterController extends Controller
{
    public $letter;
   
 
 
     public function __construct(LetterRepository $letterRepository) {
 
       $this->letter = $letterRepository;
    
    }
    public function index(){

       try {
         $letters = $this->letter->all();
        
        return response()->json($letters);
        
      } catch (Exception $ex) {
   
         return response()->json([
            "ERROR LetterController.index : ".$ex->getMessage()
         ]);
      }

    }
    public function store(Request $request){

        try {
         
          
            $letters = $this->letter->store($request->all());
            
            return response()->json($letters);
   
         } catch (Exception $ex) {
   
            return response()->json([
               "ERROR LetterController.store : ".$ex->getMessage()
            ]);
         }
           

     

    }
    public function delete(Request $request){

        try {
         
          
           $this->letter->delete($request->id);
            
           
   
         } catch (Exception $ex) {
   
            return response()->json([
               "ERROR LetterController.destroy : ".$ex->getMessage()
            ]);
         }

    }
}
