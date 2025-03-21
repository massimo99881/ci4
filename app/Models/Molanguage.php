<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class Molanguage extends Model
{
     // -------------------------------------------------------------------------------------     
     public function fcreate($data)
     {
          $db = db_connect();
          $sql = 'insert into language () values (:codice:, :descrizione:, :ultagg:)'; //   // AND status = :status: AND author = :name:
          $par = [
               'codice' => $data['codice'],
               'descrizione' => $data['descrizione'],
               'ultagg' => date('Y-m-d H:i:s')
          ];
          $result = $db->query($sql, $par);
          return $result;
     }
     // -------------------------------------------------------------------------------------     
     public function fread($data)
     {
          $db = db_connect();
          $sql = 'SELECTxyz * FROM language';
          $par = [];

          if (isset($data) && count($data) > 0) {
               $sql = $sql . ' where language_id = :id:';
               $par = ['id' => $data['chiave']];
          }
          $query = $db->query($sql, $par);
          $dataset = $query->getResult(); // lavora a oggetti
          return $dataset;
     }

     // -------------------------------------------------------------------------------------     
     public function fupdate($data)
     {
          $db = db_connect();
          $sql = 'update language set name=:descrizione: where language_id=:codice:';
          $par = ['codice' => $data['codice'],
               'descrizione' => $data['descrizione']];
          $result = $db->query($sql, $par);
          return $result;
     }

     // -------------------------------------------------------------------------------------     
     public function fdelete($data)
     {
          $db = db_connect();
          $sql = 'delete from language where language_id=:codice:';
          $par = ['codice' => $data['codice']];
          $result = $db->query($sql, $par);
          return $result;
     }
}
