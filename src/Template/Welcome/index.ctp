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
    <h3 class="text-center">Saldo mensal</h3>

    <ul class="list-group">
      <li class="list-group-item text-success">Saldo mensal: R$ <?= number_format($userBalance, 2, ',', '.'); ?></li>
      <li class="list-group-item"><a href="#">Relatórios detalhados</a></li>
    </ul>

  </div>
</div>

<div class="row content">
  <div class="col-md-5">
    <h3 class="text-center">Minha conta</h2>
    <ul class="list-group">
      <li class="list-group-item">Alterar dados</li>
      <li class="list-group-item">
      <?= $this->Html->link(__('Sair'), ['controller' => 'users', 'action' => 'logout']) ?>
      </li>
    </ul>
  </div>
</div>