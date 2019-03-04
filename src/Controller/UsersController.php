<?php

namespace App\Controller;

use App\Controller\AppController;


class UsersController extends AppController 
{
    
    public function add() 
    {
        $users = $this->Users->newEntity();

        $this->set(compact('users'));

        if ($this->request->is('POST')) {
            $this->Users->save($user);
            $this->Flash->success('Cadastro realizado com sucesso');
        } else {
            $this->Flash->error('Não foi possível realizar o seu cadastro');
        }
    }

    public function login() 
    {
        if ($this->request->is('POST')) {

            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Nome de usário ou senha incorretos');
            }
        }
    }

    public function logout() 
    {

    }
}