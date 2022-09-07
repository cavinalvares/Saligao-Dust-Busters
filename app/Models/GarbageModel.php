<?php
namespace App\Models;
use CodeIgniter\Model;

class GarbageModel extends Model{
    protected $table = 'users';
    
    protected $allowedFields = ['id', 'name', 'display_name', 'phone_no', 'email', 'address', 'password', 'user', 'session'];

    public function getUsers($user, $psw = false)
    {
        if ($psw === false) {
            return $this->where(['display_name' => $user])->first();
        }

        
        $this->where(['display_name' => $user]);
        return $this->where(['password' => $psw])->first();
    }

    

    public function getAll(){
        return $this->where(['hash !=' => null])->findAll();
    }

    public function upddata($data){
        //extract($data);
        //$this->where('display_name', "user");
        $this->update('users', ['hash'=>'hash']);
    }

    public function remember($usr, $hash){
        return $this->where(['display_name'=>$usr])->set(['session'=>$hash])->update();
    }

    public function checkcookie($hash){
        return $this->where(['session'=>$hash])->first();
    }
}