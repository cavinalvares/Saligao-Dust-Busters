<?php

namespace App\Controllers;

use App\Models\GarbageModel;

class Test extends BaseController
{
    public function index()
    {
        $model = model(GarbageModel::class);

        $data = [
            'users'  => $model->getUsers($_POST["uname"]),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('garbage/overview', $data)
            . view('templates/footer');
    }
}