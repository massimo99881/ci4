<?php

namespace App\Models;

use CodeIgniter\Model;

class GiocatoriModel extends Model
{
    protected $table = 'giocatori';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nome',
        'cognome',
        'nazione',
        'eta',
        'altezza',
        'peso',
        'mano_dominante',
        'velocita_servizio',
        'potenza_dritto',
        'precisione_dritto',
        'potenza_rovescio',
        'precisione_rovescio',
        'mobilita',
        'resistenza',
        'img'
    ];
}
