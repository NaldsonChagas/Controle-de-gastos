<div class="content columns large-12 medium-12">
  <?=$this->Form->create()?>
  <?=$this->Form->control('email')?>
  <?=$this->Form->control('password')?>
  <?=$this->Form->button('Entrar')?>
  <?=$this->Html->link(__('Ainda não tem uma conta? Cadastre-se'), 
  ['action' => 'add']);?>
  <?=$this->Form->end()?>
</div>