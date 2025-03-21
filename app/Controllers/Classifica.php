<?php

namespace App\Controllers;
use App\Models\RankingModel;

class Classifica extends BaseController
{
    public function index()
    {
        $model = new RankingModel();
        $data['classifica'] = $model->getClassifica();
        return view('classifica', $data);
    }
}
