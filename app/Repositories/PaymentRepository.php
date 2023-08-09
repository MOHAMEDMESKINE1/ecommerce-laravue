<?php
namespace App\Repositories;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PaymentRepository  implements RepositoryInterface {
    

    public $payment ; 

    public function __construct(Payment $payments) {
        $this->payment = $payments;
    }

    public function all(){

        return $this->payment->latest()->with(["user","orders"])->paginate(2);
    }
    function getById($id){

        return $this->payment->find($id);
    }
    
    public function search($query)
    {
        $payments = $this->payment
        ->where(function ($paymentQuery) use ($query) {

            $paymentQuery->where('payment_method', 'like', '%' . $query . '%');

        })->orWhereHas('user', function ($categoryQuery) use ($query) {
            $categoryQuery->where('name', 'like', '%' . $query . '%');

        })
        // ->orWhereHas('orders', function ($categoryQuery) use ($query) {
        //     $categoryQuery->where('name', 'like', '%' . $query . '%');
        // })
        ->with(["user","orders"])
        ->paginate(5);
        
        
        return $payments ;
        
    }
    public function filterStatus($query)
    {
        $filteredStatus = $this->payment->where('status', 'like', '%' . $query . '%');
        
        return $filteredStatus;
    }
   

    public function store($params){   

        $this->payment->payment_method =  $params["payment_method"];
        $this->payment->user_id =  $params["user_id"];
        $this->payment->order_id =  $params["order_id"];

        $this->payment->save();

    }

    
    public function update($params,$id){

        $payment = $this->getById($id);
       
        $payment->payment_method =  $params["payment_method"];
        $payment->user_id =  $params["user_id"];
        $payment->order_id =  $params["order_id"];

        $payment->save();

    }
   
    public function delete($id){

        $payment =$this->getById($id) ;

        $payment->delete();
        
        
    }
}
 