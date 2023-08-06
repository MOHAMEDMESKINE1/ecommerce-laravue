<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class CategoryRepository  implements RepositoryInterface {
    

    public $category ; 

    public function __construct(Category $categories) {

        $this->category = $categories;
    }

    public function all(){

        return $this->category->latest()->orderBy("title","desc")->paginate(3);
    }
    public function search($query){

    }
    public function getById($id){

        return $this->category->find($id);

    }
    public function store($params){

        // $this->category->name =  $params["name"];

        // $this->category->save();
        return  $this->category->create($params);
    }
    public function update($params,$id){

        $category = $this->getById($id);

        $category->update($params);
    }
    public function delete($id){

            $category =$this->getById($id) ;

            $category->delete();
    }
}
 