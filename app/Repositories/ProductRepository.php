<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductRepository  implements RepositoryInterface {
    

    public $product ; 

    public function __construct(Product $products) {
        $this->product = $products;
    }

    public function all(){

        return $this->product->latest()->with("categories")->orderBy("price","desc")->paginate(5);
    }
    public function search($query)
    {
        $products = $this->product
        ->where(function ($productQuery) use ($query) {

            $productQuery->where('title', 'like', '%' . $query . '%')
                ->orWhere('size', 'like', '%' .  strtoupper($query) . '%');

        })->orWhereHas('categories', function ($categoryQuery) use ($query) {
            $categoryQuery->where('name', 'like', '%' . $query . '%');
        })
        ->with("categories")
        ->paginate(5);
        
        
        return $products ;
        
    }
    public function filterByDate($selectedDate)
    {
        $filteredDate = $this->product->whereDate('created_at',$selectedDate)->paginate(5);
        // $products = $this->product->query();
        // $dateFilter = $selectedDate;

        // switch($dateFilter){
        //     case 'today':
        //         $this->product->whereDate('created_at',Carbon::today())->paginate(5);
        //         break;
        //     case 'yesterday':
        //         $this->product->wheredate('created_at',Carbon::yesterday())->paginate(5);
        //         break;
        //     case 'this_week':
        //         $this->product->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->paginate(5);
        //         break;
        //     case 'last_week':
        //         $this->product->whereBetween('created_at',[Carbon::now()->subWeek(),Carbon::now()])->paginate(5);
        //         break;
        //     case 'this_month':
        //         $this->product->whereMonth('created_at',Carbon::now()->month)->paginate(5);
        //         break;
        //     case 'last_month':
        //         $this->product->whereMonth('created_at',Carbon::now()->subMonth()->month)->paginate(5);
        //         break;
        //     case 'this_year':
        //         $this->product->whereYear('created_at',Carbon::now()->year)->paginate(5);
        //         break;
        //     case 'last_year':
        //         $this->product->whereYear('created_at',Carbon::now()->subYear()->year)->paginate(5);
        //         break;                       
        // }
        return $filteredDate;
    }
    function getById($id){

        return $this->product->find($id);
    }

    public function store($params){

        $filename  = null;
    
         

         if(request()->hasFile('photo')){
            // get image name
            $filename = time().".".request()->photo->getClientOriginalExtension();
            //  store image in public folder
            request()->photo->move(public_path('storage/products'),$filename);
           
            $this->product->photo =  $filename;

        }
        $this->product->title =  $params["title"];
        $this->product->description =  $params["description"];
        $this->product->price =  intval($params["price"]);
        $this->product->old_price =  intval($params["old_price"]);
        $this->product->quantity =  intval($params["quantity"]);
        $this->product->size =  $params["size"];
        $this->product->color =  $params["color"];
        $this->product->category_id =  $params["category_id"];

        $this->product->save();

    }

    
    public function update($params,$id){

        $product = $this->getById($id);

        $filename  = null;
    

         if(request()->hasFile('photo')){
            // get image name
            $filename = time().".".request()->photo->getClientOriginalExtension();
            //  store image in public folder
            request()->photo->move(public_path('storage/products'),$filename);
          
            $product->photo =  $filename;

        }
        $product->title =  $params["title"];
        $product->description =  $params["description"];
        $product->price =  intval($params["price"]);
        $product->old_price =  intval($params["old_price"]);
        $product->quantity =  intval($params["quantity"]);
        $product->size =  $params["size"];
        $product->color =  $params["color"];
        $product->category_id =  $params["category_id"];

        $product->save();

    }
   
    public function delete($id){

        $product =$this->getById($id) ;
     
        // Delete the existing photo
         $photo_path = $product->photo;

         if ($photo_path && file_exists(public_path('storage/products/' . $photo_path))) {
            unlink(public_path('storage/products/' . $photo_path));
        }
        $product->delete();
        
        
    }
}
 