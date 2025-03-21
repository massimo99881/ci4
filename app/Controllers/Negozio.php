<?php

namespace App\Controllers;

use App\Models\BigliettiModel;
use App\Models\AcquistiModel;

class Negozio extends BaseController
{
    public function index()
    {
        // Recupera i biglietti con join su tornei per mostrare il nome del torneo
        $bigliettiModel = new BigliettiModel();
        $data['biglietti'] = $bigliettiModel->getBigliettiConTorneo();
        return view('negozio', $data);
    }

    public function buy()
    {
        // Ottieni dati dal form
        $quantita   = $this->request->getPost('quantita');
        $bigliettoId = $this->request->getPost('biglietto_id');
        $userId     = session()->get('id');

        // Decrementa la disponibilità
        $bigliettiModel = new BigliettiModel();
        $bigliettiModel->decrementaDisponibilita($bigliettoId, $quantita);

        // Registra l'acquisto nella tabella biglietti_utenti
        $acquistiModel = new AcquistiModel();
        $acquistiModel->salvaAcquisto($userId, $bigliettoId, $quantita);

        return redirect()->to('Negozio/index');
    }
}
