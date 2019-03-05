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
                'Purchases.id' => 'asc',
            ],
        ];

        $purchases = $this->paginate($this->Purchases);

        $this->set(compact('purchases'));
    }

    public function add()
    {
        $purchase = $this->Purchases->newEntity();

        if ($this->request->is('POST')) {
            $purchasePatchEntity = $this->Purchases
                ->patchEntity($purchase, $this->request->getData());
            
            $this->Purchases->save($purchasePatchEntity);
            $this->Flash->success('Compra realizada com sucesso');
            return redirect(['action' => 'index']);
        }

        $this->set(compact('purchase'));
    }
}
