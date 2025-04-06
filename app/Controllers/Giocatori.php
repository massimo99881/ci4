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

    public function confronta($id = null)
    {
        $giocatoriModel = new GiocatoriModel();
        
        if ($id === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Primo giocatore non specificato");
        }
        $player1 = $giocatoriModel->find($id);
        if (!$player1) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Primo giocatore non trovato");
        }
        
        // Recupera il secondo giocatore se presente nel parametro GET "p2"
        $player2_id = $this->request->getGet('p2');
        $player2 = $player2_id ? $giocatoriModel->find($player2_id) : null;
        
        // Per il dropdown/risultati di ricerca, escludiamo player1
        $allPlayers = $giocatoriModel->findAll();
        $playersList = [];
        foreach ($allPlayers as $p) {
            if ($p['id'] != $player1['id']) {
                $playersList[] = $p;
            }
        }
        
        $data = [
            'player1'    => $player1,
            'player2'    => $player2,
            'playersList'=> $playersList
        ];
        
        return view('giocatori_confronta', $data);
    }
}
