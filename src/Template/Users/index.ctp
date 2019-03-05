<div class="content columns large-10 medium-10">
  <h2>Bem vindo, <?=$user['name']?></h2>
  <p><?=$this->Html->link(__('Sair'), ['action' => 'logout'])?></p>
</div>