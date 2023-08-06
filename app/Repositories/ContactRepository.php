<?php
namespace App\Repositories;

use App\Models\Contact;
use App\Models\Product;

class ContactRepository  implements RepositoryInterface {
    

    public $contact ; 

    public function __construct(Contact $contacts) {

        $this->contact = $contacts;
    }

    public function all(){

        return $this->contact->latest()->orderBy("name","desc")->paginate(5);
    }
    public function count(){

        return $this->contact->count();
    }
    public function search($query){

    }
    public function getById($id){

        return $this->contact->find($id);
    }
    public function store($params){

        return $this->contact->create($params);
    }
    public function update($params,$id){

    }
    public function delete($id){
        
            $contact =$this->getById($id) ;

            $contact->delete();

    }
}
 