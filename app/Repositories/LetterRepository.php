<?php
namespace App\Repositories;

use App\Models\Letter;
use App\Models\Product;

class LetterRepository  implements RepositoryInterface {
    

    public $letter ; 

    public function __construct(Letter $letters) {

        $this->letter = $letters;
    }

    public function all(){

        return $this->letter->latest()->orderBy("name","desc")->get();
    }
    public function count(){

        return $this->letter->count();
    }
    public function search($query){

    }
    public function getById($id){

        return $this->letter->find($id);
    }
    public function store($params){

        return $this->letter->create($params);
    }
    public function update($params,$id){

    }
    public function delete($id){
        
            $letter =$this->getById($id) ;

            $letter->delete();

    }
}
 