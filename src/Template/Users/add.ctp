<div class="content columns large-10 medium-10">
  <h2>Crie uma nova conta</h2>
  <p>Caso já tenha uma, você pode <?=$this->Html->link(__('entrar'), ['action' => 'login'])?></p>

  <?=$this->Form->create($users)?>

  <?=$this->Form->control('name')?>
  <?=$this->Form->control('email')?>
  <?=$this->Form->control('password')?>
  <?=$this->Form->control('age')?>
  <?=$this->Form->control('salary')?>
  <?=$this->Form->control('extra_lace')?>

  <?= $this->Form->button('Cadastrar')?>
  <?=$this->Form->end()?>
</div>