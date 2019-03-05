<div class="row">

  <div class="col-md-5">
    <h3 class="text-center">Minhas compras</h2>
    <ul class="list-group">
      <li class="list-group-item"><?=$this->Html->link(__('Registrar uma nova compra'), 
    ['controller' => 'purchases', 'action' => 'add'])?></li>
      <li class="list-group-item"><?=$this->Html->link(__('Ver minhas compras'), 
    ['controller' => 'purchases', 'action' => 'index'])?></li>
    </ul>
  </div>

  <div class="col-md-5">
    <h3 class="text-center">Minha conta</h2>
    <ul class="list-group">
      <li class="list-group-item">Alterar dados</li>
    </ul>
  </div>
</div>
