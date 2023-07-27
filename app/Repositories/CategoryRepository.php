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

        return $this->category->latest()->orderBy("name","desc")->get();
    }
    public function search($query){

    }
    public function getById($id){

    }
    public function store($params){
        return $this->category->create($params);
    }
    public function update($params,$id){

    }
    public function delete($id){

    }
}
 