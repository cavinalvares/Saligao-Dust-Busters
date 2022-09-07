<?php
namespace App\Models;
use CodeIgniter\Model;

class FormModel extends Model{
    protected $table = 'form';
    
    protected $allowedFields = ['Username', 'type', 'details', 'image_name'];

    public function getAll($id=-1){
        if($id == -1)
            return  $this->orderby('id', 'DESC')->findAll();
        else
            return $this->where(['id'=>$id])->first();
    }



    public function deleteform($id){
        return $this->where(['id'=>$id])->delete();

    }



}