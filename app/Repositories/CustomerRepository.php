<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CustomerRepository  implements RepositoryInterface {
    

    public $customer ; 

    public function __construct(User $customers) {
        $this->customer = $customers;
    }

    public function all(){

        return $this->customer->latest()->orderBy("name","desc")->paginate(5);
    }
    public function search($query)
    {
        $customers = $this->customer
        ->where(function ($customerQuery) use ($query) {

            $customerQuery->where('name', 'like', '%' . $query . '%');
              

        
        })
        ->paginate(5);
        
        
        return $customers ;
        
    }
    public function filterByDate($selectedDate)
    {
        $filteredDate = $this->customer->whereDate('created_at',$selectedDate)->paginate(5);
        
        return $filteredDate;
    }
    function getById($id){

        return $this->customer->find($id);
    }

    public function store($params){

        // $filename  = null;
    
         

        //  if(request()->hasFile('photo')){
        //     // get image name
        //     $filename = time().".".request()->photo->getClientOriginalExtension();
        //     //  store image in public folder
        //     request()->photo->move(public_path('storage/customers'),$filename);
           
        //     $this->customer->photo =  $filename;

        // // }
        // $this->customer->name =  $params["name"];
        // $this->customer->email =  $params["email"];
        // $this->customer->price =  intval($params["price"]);
        // $this->customer->old_price =  intval($params["old_price"]);
        // $this->customer->quantity =  intval($params["quantity"]);
        // $this->customer->size =  $params["size"];
        // $this->customer->color =  $params["color"];
        // $this->customer->category_id =  $params["category_id"];

        // $this->customer->save();

    }

    
    public function update($params,$id){

        $customer = $this->getById($id);

        // $filename  = null;
        // $file= request()->file('photo');

        //  if(request()->hasFile('photo')){
        //     // get image name
        //     $filename = time().".".$file->getClientOriginalExtension();
        //     //  store image in public folder
        //    $file->move(public_path('storage/customers'),$filename);
          
        //     $customer->photo =  $filename;

        // }
        $customer->name =  $params["name"];
        $customer->email =  $params["email"];
        // $customer->price =  intval($params["price"]);
        // $customer->old_price =  intval($params["old_price"]);
        // $customer->quantity =  intval($params["quantity"]);
        // $customer->size =  $params["size"];
        // $customer->color =  $params["color"];
    
        // $customer->category_id =  $params["category_id"];

        $customer->save();

    }
   
    public function delete($id){

        $customer =$this->getById($id) ;
     
        // Delete the existing photo
        //  $photo_path = $customer->photo;

        //  if ($photo_path && file_exists(public_path('storage/customers/' . $photo_path))) {
        //     unlink(public_path('storage/customers/' . $photo_path));
        // }
        $customer->delete();
        
        
    }
}
 