<?php

namespace App\Http\Controllers\Contact;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{

    public $contact ; 

    public  function __construct(ContactRepository $contactRepository) {

        $this->contact = $contactRepository;
    }

    public function index(){
        try {
            $products =$this->contact->all();
           
           return response()->json($products);
   
         } catch (Exception $ex) {
            
            return response()->json([
               "ERROR ContactController.index : ".$ex->getMessage()
            ]);
         }
    }
    
    public function store(Request $request){
        try {
            $products =$this->contact->store($request->all());
           
           return response()->json($products);
   
         } catch (Exception $ex) {
            
            return response()->json([
               "ERROR ContactController.store : ".$ex->getMessage()
            ]);
         }
    }
    
    public function delete(Request $request){
        try {
            $products =$this->contact->store($request->id);
           
   
         } catch (Exception $ex) {
            
            return response()->json([
               "ERROR ContactController.delete : ".$ex->getMessage()
            ]);
         }
    }
    
}
