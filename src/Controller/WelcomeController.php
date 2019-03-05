<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

use App\Controller\AppController;

class WelcomeController extends AppController
{
    public function index() 
    {
        $userTable = TableRegistry::get('users');
        $user = $userTable->get($this->Auth->user()['id']);

        $userBalance = $user->balance;
        
        $this->set(compact('userBalance'));
    }
}