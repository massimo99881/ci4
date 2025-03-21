<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return view('login', ['error' => 'Devi prima effettuare il login.']);
        }
        echo view('dashboard');
    }
}
