<div class="row">

  <table class="table table-striped">
    <thead>
      <tr>
        <td>Título</td>
        <td>Descrição</td>
        <td>Valor</td>
      </tr>
    </thead>

    <tbody>
      
    </tbody>
  </table>

  <ul class="pagination">
    <li class="page-item"><?=$this->Paginator->first(__('Primeira'))?></li>
    <li class="page-item"><?=$this->Paginator->prev(__('Anterior'))?></li>
    <li class="page-item"><?=$this->Paginator->numbers()?></li>
    <li class="page-item"><?=$this->Paginator->next(__('Próxima'))?></li>
    <li class="page-item"><?=$this->Paginator->last(__('Última'))?></li>
  </ul>

</div>