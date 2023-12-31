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

        return $this->product->latest()->with("categories")->paginate(5);
    }
    public function products(){

        return $this->product->all();
    }
    public function search($query)
    {
        $products = $this->product
        ->where(function ($productQuery) use ($query) {

            $productQuery->where('title', 'like', '%' . $query . '%')
                ->orWhere('size', 'like', '%' .  strtoupper($query) . '%');

        })->orWhereHas('categories', function ($categoryQuery) use ($query) {
            $categoryQuery->where('title', 'like', '%' . $query . '%');
        })
        ->with("categories")
        ->paginate(5);
        
        
        return $products ;
        
    }
    public function filterByDate($selectedDate)
    {
        $filteredDate = $this->product->whereDate('created_at',$selectedDate)->paginate(5);
        
        return $filteredDate;
    }
    function getById($id){

        return $this->product->findOrFail($id);
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
        $file= request()->file('photo');

         if(request()->hasFile('photo')){
            // get image name
            $filename = time().".".$file->getClientOriginalExtension();
            //  store image in public folder
           $file->move(public_path('storage/products'),$filename);
          
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
 