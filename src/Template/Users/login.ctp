<div class="row">
  <?=$this->Form->create()?>
  <div class="form-group">
  <?=$this->Form->control('email', ['class' => 'form-control'])?>
  </div>
  <div class="form-group">
    <?=$this->Form->control('password', ['class' => 'form-control'])?>
  </div>
  <?=$this->Form->button('Entrar', ['class' => 'btn btn-info'])?>
  <?=$this->Html->link(__('Ainda não tem uma conta? Cadastre-se'), 
  ['action' => 'add']);?>
  <?=$this->Form->end()?>
</div>