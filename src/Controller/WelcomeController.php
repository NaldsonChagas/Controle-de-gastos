<?php

namespace App\Controller;

use App\Controller\AppController;

class WelcomeController extends AppController
{
    public function index() 
    {
        $userBalance = $this->Auth->user()['balance'];
        $this->set(compact('userBalance'));
    }
}