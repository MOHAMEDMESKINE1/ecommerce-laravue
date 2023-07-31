<?php
namespace App\Repositories;

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
    public function search($query){

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
 