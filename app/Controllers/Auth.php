<?php

namespace App\Controllers;
use App\Models\UtentiModel;
use App\Models\NewsModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('register');
    }

    public function doLogin()
    {
        $model = new UtentiModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $utente = $model->where('email', $email)->first();

        if ($utente && password_verify($password, $utente['password'])) {
            session()->set([
                'id'      => $utente['id'],
                'nome'    => $utente['nome'],
                'email'   => $utente['email'],
                'ruolo'   => $utente['ruolo'],
                'isLoggedIn' => true
            ]);

            // Carico le news da mostrare nella dashboard
            $newsModel = new NewsModel();
            $data['news'] = $newsModel->findAll();

            return view('dashboard', $data);
        } else {
            return view('login', ['error' => 'Credenziali errate']);
        }
    }

    public function doRegister()
    {
        $model = new UtentiModel();
        $data = [
            'nome'     => $this->request->getPost('nome'),
            'cognome'  => $this->request->getPost('cognome'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'ruolo'    => 'user'
        ];
        $model->insert($data);
        return $this->login();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('Auth/login'));
    }

}
