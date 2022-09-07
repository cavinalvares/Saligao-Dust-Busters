<?php
namespace App\Models;
use CodeIgniter\Model;

class EventModel extends Model{
    protected $table = 'events';
    
    protected $allowedFields = ['event_name', 'event_venue', 'organiser_name', 'event_time', 'event_date', 'event_details', 'decide'];

    public function getEvents($decide=1){

        

        $this->where('event_date >=', date('y-m-d'));
        $this->orderby('event_date', 'ASC');
        $this->orderBy('event_time', 'ASC');
        $this->where(['event_time >=' => time()]);
       
        if($decide == 0)
            return $this->where('decide', 0)->findAll();
        else
            return $this->where('decide', 1)->findAll(); 
    }

    public function deleteevent($id){
        return $this->where(['id'=>$id])->delete();

    }

    public function acceptevent($id){
        return $this->where(['id'=> $id])->set(['decide'=>1])->update();
        
    }

}