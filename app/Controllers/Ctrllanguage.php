<?php

namespace App\Controllers;

use App\Models\Molanguage;

class Ctrllanguage extends BaseController
{
    public function Index()
    {
        $model = model(molanguage::class);
             $data = [
                'language'  => $model->fread([]),
                'title' => 'Lista lingue',
            ];

        echo view('pages/vwheader.php');
        echo view('language/vwlanguage.php', $data);
        echo view('pages/vwfooter');
    }
    public function Sel()
    {
        $model = model(molanguage::class);
        if (isset($_POST['chiave'])) {
            $data = [
                'language'  => $model->fread(['chiave' => $_POST['chiave']]),
                'title' => 'Lista lingue',
            ];
        } else {
            $data = [
                'language'  => $model->fread([]),
                'title' => 'Lista lingue',
            ];
        };
        echo view('pages/vwheader.php');
        echo view('language/vwlanguage.php', $data);
        echo view('pages/vwfooter');
    }

    public function Ins()
    {
        $model = model(molanguage::class);

        $data = [
            'language'  => $model->fcreate(['codice' => $_POST['codice'], 'descrizione' => $_POST['descrizione']]),
            'title' => 'Inserimento lingue',
        ];

        echo view('pages/vwheader.php');
        echo view('language/vwlanguageins.php', $data);
        echo view('pages/vwfooter');
    }

    public function Del()
    {
        $model = model(molanguage::class);

        $data = [
            'language'  => $model->fdelete(['codice' => $_POST['codice']]),
            'title' => 'Cancellazione lingue',
        ];

        echo view('pages/vwheader.php');
        echo view('language/vwlanguagedel.php', $data);
        echo view('pages/vwfooter');
    }
    public function Upd()
    {
        $model = model(molanguage::class);

        $data = [
            'language'  => $model->fupdate(['codice' => $_POST['codice'], 'descrizione' => $_POST['descrizione']]),
            'title' => 'Modifica descrizione lingue',
        ];

        echo view('pages/vwheader.php');
        echo view('language/vwlanguageins.php', $data);
        echo view('pages/vwfooter');
    }
}
