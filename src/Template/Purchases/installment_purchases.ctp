<h3>Compras a serem quitadas</h3>

<?=$this->Html->link(__('Página inicial'), ['controller' => 'welcome', 'action' => 'index']);?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Valor</th>
      <th>Valor de cada parcela</th>
      <th>Parcelas restantes</th>
      <th>Data</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($purchasesInstallment as $purchaseInstallment): ?>

    <tr>
      <td><?=$purchaseInstallment->purchase->title?>
      <td><?=number_format($purchaseInstallment->purchase->value, 2, ',', '.')?>
      <td><?=number_format($purchaseInstallment->purchase->value/
        $purchaseInstallment->installments, 2, ',', '.')?>
      <td><?=$purchaseInstallment->remaning_installments?></td>
      <td><?= date('d/m/Y', strtotime($purchaseInstallment->purchase->created))?>


      <td>
        <?=$this->Form->create()?>
        <input type="hidden" value="<?=$purchaseInstallment->id?>" name="installment-id">
        <?= $this->Form->button(__('Registrar pagamento'), ['class' => 'btn btn-success'])?>
        <?=$this->Form->end()?>
      </td>


    </tr>

    <?php endforeach;?>
  </tbody>

</table>