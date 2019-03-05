<div class="content columns large-10 medium-10">
  <h2>Crie uma nova conta</h2>
  <p>Caso já tenha uma, você pode <?=$this->Html->link(__('entrar'), ['action' => 'login'])?></p>

  <?=$this->Form->create($user)?>

  <div class="form-group">
    <?=$this->Form->control('name', ['class'=>'form-control'])?>
  </div>
  <div class="form-group">
    <?=$this->Form->control('email', ['class'=>'form-control'])?>
  </div>
  <div class="form-group">
    <?=$this->Form->control('password', ['class'=>'form-control'])?>
  </div>
  <div class="form-group">
    <?=$this->Form->control('age', ['class'=>'form-control'])?>
  </div>
  <div class="form-group">
    <?=$this->Form->control('salary', ['class'=>'form-control'])?>
  </div>
  <div class="form-group">
    <?=$this->Form->control('extra_lace', ['class'=>'form-control'])?>
  </div>

  <?= $this->Form->button('Cadastrar', ['class'=>'btn btn-success'])?>
  <?=$this->Form->end()?>
</div>