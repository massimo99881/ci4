<?php

namespace App\Controllers;

use App\Models\UtentiModel;
use CodeIgniter\Controller;

class TestDatabase extends Controller
{
    public function index()
    {
        $model = new UtentiModel();
        $utente = $model->trovaPerEmail('marco.rossi@email.com');

        return $this->response->setJSON($utente);
    }
}
?>