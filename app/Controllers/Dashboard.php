<?php

namespace App\Controllers;
use App\Models\NewsModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return view('login', ['error' => 'Devi prima effettuare il login.']);
        }
        $newsModel = new NewsModel();
        $data['news'] = $newsModel->findAll();

        return view('dashboard', $data);
    }
}
