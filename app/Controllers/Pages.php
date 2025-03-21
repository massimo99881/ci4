<?php

namespace App\Controllers;
use App\Models\molanguage; // per usare il model

class Pages extends BaseController
{
/*
   public function index()
    {
        return view('welcome_message');
    }
*/
public function index()
    {
        return view('pages/vWAbout');
    }


public function view($page = 'vwhome')
    {


        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
    
        $data['title'] = ucfirst($page); // Capitalize the first letter
    
    //    echo view('templates/header', $data);
        echo view('pages/vwheader.php', $data);
        echo view('pages/' . $page, $data);
        echo view('pages/vwfooter', $data);
    //    echo view('templates/footer', $data);
    }
}