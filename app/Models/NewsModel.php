<?php
namespace App\Models;
use CodeIgniter\Model;

class NewsModel extends Model{
    protected $table = 'news';
    
    protected $allowedFields = ['img_name', 'Title', 'Description'];

    public function getNews($id=-1)
    {
        if($id == -1)
            return $this->orderby('NewsId', 'Desc')->findAll();
        else
            return $this->where(['NewsID'=>$id])->first();
    }

    public function deleteNews($id){
        
        return $this->where(['NewsId'=>$id])->delete();
    }
    
    public function editNews($id, $title, $details, $img_name){
        if($title != -1)
            $this->where(['NewsId'=>$id])->set(['Title'=>$title])->update();
        if($details != -1)
            $this->where(['NewsId'=>$id])->set(['Description'=>$details])->update();
        if($img_name != -1)
            $this->where(['NewsId'=>$id])->set(['img_name'=>$img_name])->update();
        return;
    }

}