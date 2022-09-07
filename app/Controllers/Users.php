<?php

namespace App\Controllers;

use App\Models\GarbageModel;

class Users extends BaseController
{
    public function index()
    {
        $model = model(GarbageModel::class);

        $data = [
            'users'  => $model->getUsers(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('garbage/overview', $data)
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(NewsModel::class);

        $data['users'] = $model->getUsers($slug);

        if (empty($data['users'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the user: ' . $slug);
        }

        $data['title'] = $data['users']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
}