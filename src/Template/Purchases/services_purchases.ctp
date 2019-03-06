<?= $this->Html->link(__('Página inicial'), ['controller' => 'welcome', 'action' => 'index']) ?>
<table class="table table-bordered">
  <thead>
    <tr>
      <td>Título</td>
      <td>Valor</td>
      <td>Data de adesão</td>
    </tr>
  </thead>

  <tbody>
    <?php foreach($servicesPurchases as $service) ?>
    <tr>
      <td><?= $service->title ?></td>
      <td>R$ <?=number_format($service->value, 2, ',', '.') ?></td>
      <td><?= date('d/m/Y', strtotime($service->created)) ?></td>
      <td>
        <?= $this->Form->create() ?>
        <input type="hidden" value="<?=$service->id?>" name="service-id">
        <?= $this->Form->button('Registrar pagamento', ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
      </td>
    </tr>
  </tbody>
</table>