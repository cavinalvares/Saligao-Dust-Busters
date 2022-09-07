<?php

namespace App\Controllers;

session_start();

class Map extends BaseController
{
    public function index()
    {
        if(isset($_SESSION['username']))
        {
            $model = model(BinModel::class);
            $data['bins'] = $model->getBins();
            $title_data['title'] = "Village Map";
            return  view('dust_busters/nav', $title_data).
                    view('dust_busters/map', $data);
        }
        else
            return view('dust_busters/initial');
            
    }

}