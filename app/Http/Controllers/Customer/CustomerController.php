<?php

namespace App\Http\Controllers\Customer;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    public $customer ; 

    public  function __construct(CustomerRepository $customerRepository) {

        $this->customer = $customerRepository;
    }

    public function index(){
        try {

            $customers =$this->customer->all();
           
           return response()->json($customers);
   
         } catch (Exception $ex) {
            
            return response()->json([
               "ERROR CustomerController.index : ".$ex->getMessage()
            ]);
         }
    }
    // public function count(){
    //     try {
    //         $count =$this->customer->count();
           
    //        return response()->json(["count"=>$count]);
   
    //      } catch (Exception $ex) {
            
    //         return response()->json([
    //            "ERROR CustomerController.count : ".$ex->getMessage()
    //         ]);
    //      }
    // }
    
    public function store(Request $request){
        // try {
           
        //     $customers =$this->customer->store($request->all());
           
        //    return response()->json($customers);
   
        //  } catch (Exception $ex) {
            
        //     return response()->json([
        //        "ERROR CustomerController.store : ".$ex->getMessage()
        //     ]);
        //  }
    }
    
    public function delete(Request $request){
        try {

          $this->customer->delete($request->id);
           
   
         } catch (Exception $ex) {
            
            return response()->json([
               "ERROR CustomerController.delete : ".$ex->getMessage()
            ]);
         }
    }
}
