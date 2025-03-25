<?php

namespace App\Controllers;

use App\Models\GiocatoriModel;

class Giocatori extends BaseController
{
    public function index()
    {
        $model = new GiocatoriModel();
        $data['giocatori'] = $model->findAll();
        return view('giocatori', $data);
    }
    
    public function detail($id = null)
    {
        // Se l'id non è passato via URL, prova a recuperarlo dal POST
        if ($id === null) {
            $id = $this->request->getPost('id');
        }
        
        $giocatoriModel = new GiocatoriModel();
        $giocatore = $giocatoriModel->find($id);
        
        if (!$giocatore) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Giocatore non trovato");
        }
        
        return view('giocatore_detail', ['giocatore' => $giocatore]);
    }
}
