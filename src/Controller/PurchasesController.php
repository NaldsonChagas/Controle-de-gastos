<?php

namespace App\Controller;

use App\Controller\AppController;

class PurchasesController extends AppController
{

    public function index() 
    {
        $this->paginate = [
            'limit' => 5,
            'order' => [
                'Purchases.id' => 'asc'
            ]
        ];

        $purchases = $this->paginate($this->Purchases);

        $this->set(compact('purchases'));
    }
}