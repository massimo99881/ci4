<?php

namespace App\Models;

use CodeIgniter\Model;

class PartiteModel extends Model
{
    protected $table = 'partite';
    protected $primaryKey = 'id';
    protected $allowedFields = ['torneo_id', 'giocatore1_id', 'giocatore2_id', 'risultato'];

    public function getPartiteConDettagli()
    {
        $builder = $this->db->table($this->table);
        // Seleziona i campi della partita, le informazioni del torneo e dei giocatori
        $builder->select('partite.*, 
            tornei.nome as nomeTorneo, tornei.luogo, tornei.data_inizio,
            g1.nome as nomeGiocatore1, g1.cognome as cognomeGiocatore1, g1.img as imgGiocatore1,
            g2.nome as nomeGiocatore2, g2.cognome as cognomeGiocatore2, g2.img as imgGiocatore2');
        $builder->join('tornei', 'tornei.id = partite.torneo_id', 'left');
        $builder->join('giocatori as g1', 'g1.id = partite.giocatore1_id', 'left');
        $builder->join('giocatori as g2', 'g2.id = partite.giocatore2_id', 'left');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
