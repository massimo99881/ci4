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
            'utente_id' => $userId,
            'biglietto_id' => $bigliettoId,
            'quantita' => $quantita
        ];
        return $this->insert($data);
    }
}
