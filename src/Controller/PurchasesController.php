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
            $purchasePatchEntity->is_constant_payment = false;
            
            if ($this->Purchases->save($purchasePatchEntity)) {

                $installment = null;
                if (isset($this->request->data['isInstallments']))
                    $installment = $this->installmentPayment($purchasePatchEntity);

                $this->decreaseUserBalance($purchasePatchEntity, 
                    isset($this->request->data['isInstallments']), $installment);

                $this->Flash->success(__('Compra realizada com sucesso'));  
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível registrar sua compra'));
            }
        }

        $this->set(compact('purchase'));
    }

    public function installmentPurchases()
    {
        $installmentTable = TableRegistry::get('installments');
        $query = $installmentTable->find()->contain('Purchases')
            ->where(['Purchases.user_id = ' => $this->Auth->user()['id']]);
        
        $purchasesInstallment = $query->all();

        if ($this->request->is('POST')) {
            $this->registerInstallmentPay();
        }

        $this->set(compact('purchasesInstallment'));
    }

    public function addConstantPayment() 
    {
        $purchase = $this->Purchases->newEntity();

        if ($this->request->is('POST')) {
            $purchasePatchEntity = $this->Purchases
                ->patchEntity($purchase, $this->request->getData());
            
            $purchasePatchEntity->user_id = $this->Auth->user()['id'];
            
            if ($this->Purchases->save($purchasePatchEntity)) {
                $this->Flash->success('Serviço cadastrado com sucesso');
                return $this->redirect(['controller' => 'welcome', 'action' => 'index']);
            }
        }

        $this->set(compact('purchase'));
    }

    public function servicesPurchases() 
    {
        $query = $this->Purchases->find('all')->where(['Purchases.is_constant_payment' => '1']);
        $servicesPurchases = $query->all();

        if ($this->request->is('POST')) {

            $purchaseData = $this->Purchases->get($this->request->data['service-id']);

            $purchase = $this->Purchases->newEntity();
            $purchase->title = __('Pagamento ').$purchaseData->title;
            $purchase->value = $purchaseData->value;
            $purchase->description = $purchaseData->description;
            $purchase->user_id = $this->Auth->user()['id'];
            $purchase->is_constant_payment = true;
            $this->decreaseUserBalance($purchase, false, null);    

            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('Pagamento registrado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível registrar o pagamento'));
            }
        }

        $this->set(compact('servicesPurchases'));
    }

    private function registerInstallmentPay()
    {
        $installmentTable = TableRegistry::get('installments');
        $installment = $installmentTable->get($this->request->data['installment-id']);        
        $installment->remaning_installments = $installment->remaning_installments - 1;

        $installmentTable->save($installment);

        $purchaseData = $this->Purchases->get($installment->purchase_id);

        $purchase = $this->Purchases->newEntity();

        $purchase->title = __('Pagamento de parcela do ').$purchaseData->title;
        $purchase->value = $purchaseData->value;
        $purchase->description = $purchaseData->description;
        $purchase->user_id = $this->Auth->user()['id'];
        $purchase->is_constant_payment = false;
        $this->decreaseUserBalance($purchase, true, $installment);

        if ($this->Purchases->save($purchase)) {
            $this->Flash->success(__('Registro de pagamento de parcela feito com sucesso!'));
            return $this->redirect(['action' => 'index']);
        }
    }

    private function decreaseUserBalance($purchase, $isInstallmentPurchase, $installment) 
    {
        $userTable = TableRegistry::get('users');
        $user = $userTable->get($purchase->user_id);
        
        if (!$isInstallmentPurchase) {
            $user->balance = $user->balance - $purchase->value;
        } else {

            $valuePerMonth = $purchase->value/$installment->installments;

            $user->balance = $user->balance - $valuePerMonth;
        }

        $userTable->save($user);
    }

    private function installmentPayment($purchase) 
    {
        $installmentData = $this->request->data['installment-number'];

        $installmentTable = TableRegistry::get('installments');
        $installment = $installmentTable->newEntity();

        $installment->purchase_id = $purchase->id;
        $installment->value = $purchase->value;
        $installment->start = date("Y-m-d", strtotime($purchase->created));
        $installment->installments = $installmentData;
        $installment->remaning_installments = $installmentData - 1;

        $installmentTable->save($installment);
        
        return $installment;
    }
}
