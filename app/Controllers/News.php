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
    
    public function detail($id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->find($id);
        
        if (!$news) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Notizia non trovata");
        }
        
        return view('news_detail', ['news' => $news]);
    }
    
    // Metodo per inserire una nuova notizia (solo admin)
    public function insert()
    {
        $newsModel = new NewsModel();

        // Recupera i dati dal form
        $titolo = $this->request->getPost('titolo');
        $descrizione = $this->request->getPost('descrizione');

        // Controlla se è stato caricato un file
        $imgUrl = $this->request->getPost('img_url');
        $file = $this->request->getFile('img_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . '../public/images/news', $newName);
            $imgPath = 'images/news/' . $newName;
        } else {
            // Se non è stato caricato un file, usa l'URL fornito
            $imgPath = $imgUrl;
        }

        $data = [
            'titolo' => $titolo,
            'descrizione' => $descrizione,
            'img' => $imgPath
        ];

        $newsModel->insert($data);
        return redirect()->to(site_url('News/index'));
    }
    
    // Metodo per eliminare una notizia (solo admin)
    public function delete($id)
    {
        $newsModel = new NewsModel();
        $newsModel->delete($id);
        return redirect()->to(site_url('News/index'));
    }
}
