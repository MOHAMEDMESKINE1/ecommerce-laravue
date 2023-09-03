<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderRepository  implements RepositoryInterface {
    

    public $order ; 

    public function __construct(Order $orders) {

        $this->order = $orders;
    }

    public function all(){

        return $this->order->with(["user","products","payments"])->paginate(5);
    }
    public function Sales(){
        $today = Carbon::now();
        $startDate = Carbon::create(date('Y'), 1, 1); // Start from January 1st of the current year

        $orders = $this->order->select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as date"))
            ->whereBetween('created_at', [$startDate, $today])
            ->groupBy('date')
            ->pluck('count', 'date');
        
        return $orders;
    }
    public function StatusPayments(){

        $statuses = ['Pending','Processing','Confirmed','Shipped','Delivered','On Hold','Cancelled'];
        
        $today = Carbon::now();
        $startDate = Carbon::create(date('Y'), 1, 1); // Start from January 1st of the current year

        $orders = $this->order->select(
            DB::raw("COUNT(*) as count"), 
            DB::raw("status"),
          
        )
            ->whereBetween('created_at', [$startDate, $today])
            ->whereIn('status', $statuses)
            ->groupBy('status')
            ->pluck('count','status');
        
        return $orders;
    }
    function getById($id){

        // return $this->order->find($id);
        $order  = $this->order->with(["user","products"])->where("id",$id)->first();
        return $order ; 
    }
    function getByIdSearch($id){

        $order  = $this->order->with(["user","products"])->findOrFail($id);
        return $order ; 
    }
    public function getProductCount($productId)
    {
        $product =$this->order->getById($productId);
    
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // $count = $product->orders()->count(); // Assuming you have a relationship set up for orders
        $count = $product->orders()->count(); // Assuming you have a relationship set up for orders
    
        return $count ;
    }
    public function search($query)
    {
        $order = $this->order->where('status', 'like', '%' . $query . '%')->get();        
        return $order ; 
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
        $this->order->user_id =  $params["customer"];
        $this->order->product_id =  $params["product"];

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
 