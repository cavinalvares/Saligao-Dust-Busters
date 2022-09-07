<?php

namespace App\Controllers;

session_start();

class Events extends BaseController
{

    public function index(){
        if(isset($_SESSION['username']) or isset($_COOKIE['session']))
        {
            if(isset($_COOKIE['session'])){
                $model = model(GarbageModel::class);
                $data['user'] = $model->checkcookie($_COOKIE['session']);
                if(!empty($data)){
                    $_SESSION['username'] = $data['user']['display_name'];
                    $_SESSION['mode'] = $data['user']['mode']; 
                    setcookie("session", $_COOKIE['session'], time()+(30*60), "/");
                }
            }
            $title_data['title'] = "Event Scheduling";
            return  view('dust_busters/nav', $title_data).
                    view('dust_busters/schedule_events');
        }
        else
            return view('dust_busters/initial');
    }

    public function get_events()
    {
        if(isset($_SESSION['username']))
        {
            $model = model(EventModel::class);
            $data['events'] = $model->getEvents();
            $title_data['title'] = "Upcoming Events";
            return  view('dust_busters/nav', $title_data).
                    view('dust_busters/events', $data);
        }
        else
            return view('dust_busters/initial');
            
    }

    public function set_event()
    {
        
        $ename = $_POST["ename"];
        $evenue = $_POST["evenue"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $edesc = $_POST["edesc"];
              
        $model = model(GarbageModel::class);
        
        $data['users'] = $model->getUsers($_SESSION["username"]);
        
        $model = model(EventModel::class);
        
        $dates = strtotime($date);
        $date_d = date("d", $dates);
        $date_m = date("m", $dates);
        $date_y = date("Y", $dates);

        if($date_d >= date("d")+2 && $date_m >= date("m") && $date_y >= date("Y")){
        
            $model->save([
                'event_name' => $ename,
                'event_venue' => $evenue,
                'organiser_name' => $data['users']['name'],
                'event_time' => $time,
                'event_date' => $date,
                'event_details' => $edesc,
            ]);        

            echo "0";

        }
        else{
            echo "1";
        }         
    }

}