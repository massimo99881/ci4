<?php

namespace App\Controllers;

use App\Models\AcquistiModel;

class Acquisti extends BaseController
{
    public function index()
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->to(site_url('Auth/login'));
        }
        
        $acquistiModel = new AcquistiModel();
        $data['acquisti'] = $acquistiModel->getAcquistiByUtente($userId);
        
        return view('miei_biglietti', $data);
    }
    
    // Nuovo metodo per eliminare un acquisto
    public function delete($id)
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->to(site_url('Auth/login'));
        }
        
        $acquistiModel = new AcquistiModel();
        // Verifica che l'acquisto esista ed appartenga all'utente loggato
        $acquisto = $acquistiModel->find($id);
        if ($acquisto && $acquisto['utente_id'] == $userId) {
            $acquistiModel->delete($id);
        }
        
        return redirect()->to(site_url('Acquisti/index'));
    }
}
