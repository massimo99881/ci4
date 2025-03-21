<?php

namespace App\Models;

use CodeIgniter\Model;

class RankingModel extends Model
{
    protected $table = 'ranking';
    protected $primaryKey = 'id';
    protected $allowedFields = ['giocatore_id', 'posizione', 'punti'];

    public function getClassifica()
    {
        return $this->db->table('ranking')
            ->select('ranking.posizione, ranking.punti, giocatori.nome, giocatori.cognome, giocatori.nazione')
            ->join('giocatori', 'ranking.giocatore_id = giocatori.id')
            ->orderBy('ranking.posizione', 'ASC')
            ->get()
            ->getResultArray();
    }
}