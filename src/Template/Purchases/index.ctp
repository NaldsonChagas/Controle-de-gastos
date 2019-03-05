<div class="row">
  
  <?=$this->Html->link(__('Página inicial'),
    ['controller' => 'welcome', 'action' => 'index'])?>

  <table class="table table-striped">
    <thead>
      <tr>
        <td>Título</td>
        <td>Valor</td>
        <td>Data</td>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($purchases as $purchase):
      ?>

      <tr>
        <td><?=$purchase->title?></td>
        <td><?=$purchase->value?></td>
        <td><?=$purchase->created?></td>
      </tr>

      <?php
      endforeach;
      ?>
    </tbody>
  </table>
  <ul class="pagination">
    <li class="page-item"><?=$this->Paginator->first(__('Primeira'))?></li>
    <li class="page-item"><?=$this->Paginator->prev(__('Anterior'))?></li>
    <li class="page-item"><?=$this->Paginator->numbers()?></li>
    <li class="page-item"><?=$this->Paginator->next(__('Próxima'))?></li>
    <li class="page-item"><?=$this->Paginator->last(__('Última'))?></li>
  </ul>
  <br>
</div>
