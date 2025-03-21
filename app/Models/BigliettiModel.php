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
        /*
         * Esegui una JOIN per recuperare:
         * - biglietti.id
         * - biglietti.torneo_id
         * - biglietti.prezzo
         * - biglietti.disponibilita
         * - tornei.nome (nome del torneo)
         */
        return $this
            ->select('biglietti.*, tornei.nome as nomeTorneo')
            ->join('tornei', 'tornei.id = biglietti.torneo_id')
            ->findAll();
    }

    public function decrementaDisponibilita($bigliettoId, $quantita)
    {
        // 1. Recupera la riga corrispondente
        $biglietto = $this->find($bigliettoId);
        if (!$biglietto) {
            return false; // o lanciare un'eccezione
        }

        // 2. Calcola nuova disponibilità
        $nuovaDisponibilita = $biglietto['disponibilita'] - $quantita;
        if ($nuovaDisponibilita < 0) {
            $nuovaDisponibilita = 0; // o gestire l'errore in altro modo
        }

        // 3. Aggiorna
        $this->update($bigliettoId, ['disponibilita' => $nuovaDisponibilita]);

        return true;
    }
}
