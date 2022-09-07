<?php

namespace App\Controllers;

session_start();

class Home extends BaseController
{
    public function index()
    {
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
            return view('dust_busters/home');
        }
        else
            return view('dust_busters/initial');
            
    }

    public function form()
    {
        return view('dust_busters/form');
    }
}
