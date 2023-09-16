<?php

namespace App\Controller;

class IndexController extends AppController
{
    public function index()
    {
        return $this->redirect(['controller' => 'Candidatos', 'action' => 'index']);
    }

    public function home()
    {
        return $this->redirect(['controller' => 'Candidatos', 'action' => 'index']);
    }
}
