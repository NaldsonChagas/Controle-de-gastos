<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{

    public function index() 
    {
        $user = $this->Auth->user();
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('POST')) {

            echo $user->salary;

            $userPatchEntity = $this->Users->PatchEntity($user,
                $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success('Cadastro realizado com sucesso');
            } else {
                $this->Flash->error('Não foi possível realizar o seu cadastro');
            }
        }

        $this->set(compact('user'));
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
        return $this->redirect($this->Auth->logout());
    }
}
