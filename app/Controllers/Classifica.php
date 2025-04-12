<?php

namespace App\Controllers;

use App\Models\RankingModel;

class Classifica extends BaseController
{
    public function index()
    {
        $model = new RankingModel();
        $data['classifica'] = $model->getClassifica();
        return view('classifica', $data);
    }
    
    // Metodo per aggiornare i punti via AJAX (solo admin)
    public function update()
    {
        log_message('debug', 'Classifica::update - Test log: metodo update avviato');
        $method = $this->request->getMethod(true);
        log_message('debug', 'Classifica::update - Metodo ricevuto: ' . $method);
        
        if ($method === 'POST') {
            $json = $this->request->getJSON(true);
            $id = $json['id'] ?? null;
            $punti = $json['punti'] ?? null;

            log_message('debug', 'Classifica::update - Ricevuti: id=' . $id . ', punti=' . $punti);
            
            if ($id && $punti !== null) {
                $rankingModel = new RankingModel();
                $updateData = ['punti' => $punti];
                $rankingModel->update($id, $updateData);
                $affected = $rankingModel->db->affectedRows();
                log_message('debug', 'Classifica::update - Righe aggiornate: ' . $affected);
                if ($affected > 0) {
                    return $this->response->setJSON(['success' => true]);
                }
            }
        } else {
            log_message('debug', 'Classifica::update - Metodo non POST');
        }
        
        return $this->response->setJSON(['success' => false]);
    }
}
