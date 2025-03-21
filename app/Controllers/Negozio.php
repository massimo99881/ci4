<?php

namespace App\Controllers;

use App\Models\BigliettiModel;
use App\Models\AcquistiModel; // modello che creeremo per gestire la tabella biglietti_utenti

class Negozio extends BaseController
{
    public function index()
    {
        // 1. Recupera i biglietti (con join su tornei per mostrare il nome del torneo)
        $bigliettiModel = new BigliettiModel();
        $data['biglietti'] = $bigliettiModel->getBigliettiConTorneo();

        // 2. Mostra la vista "negozio"
        return view('negozio', $data);
    }

    public function buy()
    {
        // 1. Otteniamo i dati dal form
        $quantita = $this->request->getPost('quantita');
        $bigliettoId = $this->request->getPost('biglietto_id');
        
        // 2. Recuperiamo l'ID dell'utente loggato (salvato in sessione)
        $userId = session()->get('id');
        
        // 3. Decrementiamo la disponibilità del biglietto
        $bigliettiModel = new BigliettiModel();
        $bigliettiModel->decrementaDisponibilita($bigliettoId, $quantita);

        // 4. Registriamo l'acquisto nella tabella biglietti_utenti
        $acquistiModel = new AcquistiModel();
        $acquistiModel->salvaAcquisto($userId, $bigliettoId, $quantita);

        // 5. Redirect alla pagina del negozio
        return redirect()->to('Negozio/index');
    }
}
