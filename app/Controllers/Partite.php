<?php

namespace App\Controllers;

use App\Models\PartiteModel;

class Partite extends BaseController
{
    public function index()
    {
        $model = new PartiteModel();
        $data['partite'] = $model->getPartiteConDettagli();
        return view('partite', $data);
    }
}
