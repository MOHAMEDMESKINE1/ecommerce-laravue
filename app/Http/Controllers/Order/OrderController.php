<?php

namespace App\Http\Controllers\Order;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProductRepository;

class OrderController extends Controller
{
    public $product;
    public $customer;
    public $order;
 
 
     public function __construct(ProductRepository $productRepository,CustomerRepository $customerRepository,OrderRepository $orderRepository) {
 
       $this->product = $productRepository;
       $this->customer = $customerRepository;
       $this->order = $orderRepository;
    }
    public function index()
    {
        $orders  = $this->order->all();
       
         // $data = [
         //    "orders"=>$orders,
         //    "customers"=>$customers,
         // ];
        return response()->json($orders);
    }
    public function customers()
    {
       
        $customers  = $this->customer->all();
        
        return response()->json($customers);
    }
    public function products()
    {
       
        $products  = $this->product->all();
        
        return response()->json($products);
    }
    
    public function ordersSales()
    {
       
        $sales  = $this->order->Sales();
        
        return response()->json($sales);
    }
    public function Payments()
    {
       
        $payments  = $this->order->StatusPayments();
        
        return response()->json($payments);
    }

    public function search (Request $request){
      
        try {
  
           $search_query =$request->input('q');
  
           $order  = $this->order->search($search_query);
                
           return response()->json($order);
   
           
   
           
             
  
          
  
  
        } catch (Exception $ex) {
           
           return response()->json([
              "ERROR OrderController.search : ".$ex->getMessage()
           ]);
        }
       
  
     }
     public function filter (Request $request){
        
        try {
  
           $filter_query =$request->input('status');
  
           $order  = $this->order->filterStatus($filter_query);
           
          if($order){
           return response()->json($order);
             
  
          }else{
              $orders =$this->order->all();
              
               return response()->json($orders);
  
          }
  
  
        } catch (Exception $ex) {
           
           return response()->json([
              "ERROR OrderController.filter : ".$ex->getMessage()
           ]);
        }
       
  
     }
     public function show ($id){
        
        try {
  
           $order  = $this->order->getById($id);
           
            return response()->json($order);
  
        } catch (Exception $ex) {
           
           return response()->json([
              "ERROR orderController.show : ".$ex->getMessage()
           ]);
        }
       
  
     }
    
     public function store(Request $request){
  
        try {
         
          
           $orders = $this->order->store($request->all());
           
           return response()->json($orders);
  
        } catch (Exception $ex) {
  
           return response()->json([
              "ERROR orderController.store : ".$ex->getMessage()
           ]);
        }
          
     }
     public function update(Request $params,$id){
  
        try {
  
           $orders = $this->order->update($params,$id);
  
           return response()->json($orders);
  
        } catch (Exception $ex) {
  
           return response()->json([
              "ERROR OrdeController.update : ".$ex->getMessage()
           ]);
        }
          
     }
     public function delete(Request $request){
  
        try {
  
           $this->order->delete($request->id);
    
          } catch (Exception $ex) {
    
             return response()->json([
                "ERROR OrdeController.delete : ".$ex->getMessage()
             ]);
          }
  
     }
}
