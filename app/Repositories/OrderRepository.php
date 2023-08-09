<?php
namespace App\Repositories;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class OrderRepository  implements RepositoryInterface {
    

    public $order ; 

    public function __construct(Order $orders) {

        $this->order = $orders;
    }

    public function all(){

        return $this->order->latest()->with(["user","products","payments"])->paginate(2);
    }
    function getById($id){

        return $this->order->find($id);
    }

    public function search($query)
    {
        $orders = $this->order
        ->where(function ($orderQuery) use ($query) {

            $orderQuery->where('payment', 'like', '%' . $query . '%');

        })->orWhereHas('user', function ($categoryQuery) use ($query) {
            $categoryQuery->where('name', 'like', '%' . $query . '%');
        })
        ->with(["user","products","payments"])
        ->paginate(2);
        
        
        return $orders ;
        
    }
    public function filterStatus($query)
    {
        $filteredStatus = $this->order->where('status', 'like', '%' . $query . '%');
        
        return $filteredStatus;
    }
   

    public function store($params){   

        $this->order->quantity =  intval($params["quantity"]);
        $this->order->price =  intval($params["price"]);
        $this->order->total = intval($params["quantity"]) * intval($params["price"])   ;
        $this->order->payment =  $params["payment"];
        $this->order->status =  $params["status"];
        $this->order->user_id =  $params["user_id"];
        $this->order->product_id =  $params["product_id"];

        $this->order->save();

    }

    
    public function update($params,$id){

        $order = $this->getById($id);

        $order->quantity =  intval($params["quantity"]);
        $order->price =  intval($params["price"]);
        $order->total = intval($params["quantity"]) * intval($params["price"])   ;
        $order->payment =  $params["payment"];
        $order->status =  $params["status"];
        $order->user_id =  $params["user_id"];
        $order->product_id =  $params["product_id"];

        $order->save();

    }
   
    public function delete($id){

        $order =$this->getById($id) ;

        $order->delete();
        
        
    }
}
 