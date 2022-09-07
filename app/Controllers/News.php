<?php

namespace App\Controllers;

session_start();

class News extends BaseController
{

    public function get_news(){
        if(isset($_SESSION['username']))
        {

            $model = model(NewsModel::class);
            $data['all_news'] = $model->getNews();
            $title_data['title'] = "News";
            return  view('dust_busters/nav', $title_data).
                    view('dust_busters/news', $data);
        }
        else
            return view('dust_busters/initial');
    }
}