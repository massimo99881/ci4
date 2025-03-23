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
        $builder = $this->db->table($this->table);
        $builder->select('biglietti.*, tornei.nome as nomeTorneo, tornei.data_inizio, tornei.data_fine');
        $builder->join('tornei', 'tornei.id = biglietti.torneo_id');
        // Visualizza solo i tornei che non sono ancora iniziati
        $builder->where('tornei.data_inizio >', date('Y-m-d'));
        // Ordina per data_inizio in ordine ascendente
        $builder->orderBy('tornei.data_inizio', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
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
