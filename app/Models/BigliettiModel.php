<?php

namespace App\Models;

use CodeIgniter\Model;

class BigliettiModel extends Model
{
    protected $table = 'biglietti';
    protected $primaryKey = 'id';
    protected $allowedFields = ['torneo_id', 'prezzo', 'disponibilita'];

    public function getBigliettiConTorneo()
    {
        return $this
            ->select('biglietti.*, tornei.nome as nomeTorneo')
            ->join('tornei', 'tornei.id = biglietti.torneo_id')
            ->findAll();
    }

    public function decrementaDisponibilita($bigliettoId, $quantita)
    {
        $biglietto = $this->find($bigliettoId);
        if (!$biglietto) {
            return false;
        }
        $nuovaDisponibilita = $biglietto['disponibilita'] - $quantita;
        if ($nuovaDisponibilita < 0) {
            $nuovaDisponibilita = 0;
        }
        $this->update($bigliettoId, ['disponibilita' => $nuovaDisponibilita]);
        return true;
    }
}
