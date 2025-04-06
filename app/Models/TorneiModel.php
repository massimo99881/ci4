<?php

namespace App\Models;

use CodeIgniter\Model;

class TorneiModel extends Model
{
    protected $table = 'tornei';
    protected $primaryKey = 'id';
    protected $allowedFields = ['categoria_id', 'nome', 'luogo', 'data_inizio', 'data_fine'];
}
