<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

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

            $purchasePatchEntity->user_id = $this->Auth->user()['id'];
            
            
            if ($this->Purchases->save($purchasePatchEntity)) {

                if (isset($this->request->data['isInstallments']))
                    $this->installmentPayment($purchasePatchEntity);

                $this->decreaseUserBalance($purchasePatchEntity);

                $this->Flash->success(__('Compra realizada com sucesso'));  
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível registrar sua compra'));
            }
        }

        $this->set(compact('purchase'));
    }

    private function decreaseUserBalance($purchase) 
    {
        $userTable = TableRegistry::get('users');
        $user = $userTable->get($purchase->user_id);
        
        $user->balance = $user->balance - $purchase->value;
        $userTable->save($user);
    }

    private function installmentPayment($purchase) 
    {
        $installmentData = $this->request->data['installment-payment'];

        $installmentTable = TableRegistry::get('installments');
        $installment = $installmentTable->newEntity();

        $installment->purchase_id = $purchase->id;
        $installment->value = $purchase->value;
        $installment->start = date("Y-m-d", strtotime($purchase->created));
        $installment->installments = $installmentData;

        $installmentTable->save($installment);
    }
}
