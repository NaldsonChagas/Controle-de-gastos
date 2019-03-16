<div class="row">
  
  <?=$this->Html->link(__('Página inicial'),
    ['controller' => 'welcome', 'action' => 'index'])?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <td>Título</td>
        <td>Valor</td>
        <td>Data</td>
        <td>Pagamento recorrente (Pagamento de um serviço)</td>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($purchases as $purchase):
      ?>

      <tr>
        <td><?=$purchase->title?></td>
        <td><?=number_format($purchase->value, 2, ',', '.')?></td>
        <td><?=date('d/m/Y', strtotime($purchase->created))?></td>
        <td><?=$purchase->is_constant_payment == 1 ? 'Sim' : 'Não'?></td>
      </tr>

      <?php
      endforeach;
      ?>
    </tbody>
  </table>
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li class="page-item"><?=$this->Paginator->first(__('Primeira'), ['class' => 'page-link'])?></li>
      <li class="page-item"><?=$this->Paginator->prev(__('Anterior'), ['class' => 'page-link'])?></li>
      <li class="page-item"><?=$this->Paginator->numbers()?></li>
      <li class="page-item"><?=$this->Paginator->next(__('Próxima'), ['class' => 'page-link'])?></li>
      <li class="page-item"><?=$this->Paginator->last(__('Última'), ['class' => 'page-link'])?></li>
    </ul>
  </nav>
</div>
