<?php

namespace App\Models;

use CodeIgniter\Model;

class UtentiModel extends Model
{
    protected $table      = 'utenti'; // Nome della tabella
    protected $primaryKey = 'id'; // Chiave primaria

    protected $allowedFields = ['nome', 'cognome', 'email', 'password', 'ruolo', 'created_at'];

    protected $useTimestamps = false; // Usiamo `created_at` manualmente

    /**
     * Trova un utente per email.
     */
    public function trovaPerEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
?>