<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel();
        $data['news'] = $newsModel->findAll();
        return view('news_index', $data);
    }
    
    // Metodo per mostrare i dettagli di una notizia
    public function detail($id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->find($id);
        
        if (!$news) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Notizia non trovata");
        }
        
        $data['news'] = $news;
        return view('news_detail', $data);
    }
}
