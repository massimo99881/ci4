<?php

namespace App\Controllers;

use App\Models\TorneiModel;

class Tornei extends BaseController
{
    public function index()
    {
        $model = new TorneiModel();
        $data['tornei'] = $model->findAll();
        return view('tornei', $data);
    }
}
