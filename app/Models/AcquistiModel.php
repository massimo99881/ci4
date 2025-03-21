<?php

namespace App\Models;

use CodeIgniter\Model;

class AcquistiModel extends Model
{
    protected $table = 'biglietti_utenti';
    protected $primaryKey = 'id';
    protected $allowedFields = ['utente_id', 'biglietto_id', 'quantita', 'created_at'];

    public function salvaAcquisto($userId, $bigliettoId, $quantita)
    {
        $data = [
            'utente_id'   => $userId,
            'biglietto_id' => $bigliettoId,
            'quantita'    => $quantita
        ];
        return $this->insert($data);
    }

    public function getAcquistiByUtente($userId)
    {
        return $this->select('biglietti_utenti.*, biglietti.prezzo, tornei.nome as nomeTorneo')
                    ->join('biglietti', 'biglietti.id = biglietti_utenti.biglietto_id')
                    ->join('tornei', 'tornei.id = biglietti.torneo_id')
                    ->where('biglietti_utenti.utente_id', $userId)
                    ->orderBy('biglietti_utenti.created_at', 'DESC')
                    ->findAll();
    }
}
