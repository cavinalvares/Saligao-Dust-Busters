<?php
namespace App\Models;
use CodeIgniter\Model;

class BinModel extends Model{
    protected $table = 'bins';
    
    protected $allowedFields = ['BinId', 'Lat', 'Lng', 'Date'];

    public function getBins(){

        return $this->findAll();
    }

}